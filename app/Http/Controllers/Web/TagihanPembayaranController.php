<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\PencatatanMeteran;
use App\Models\TagihanPembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TagihanPembayaranController extends Controller
{
    public function index(Request $request) {
        $select_rt = Pelanggan::select(['rt'])->distinct()->orderBy('rt')->get();
        $select_rw = Pelanggan::select(['rw'])->distinct()->orderBy('rw')->get();

        if (!$request->bulan && !$request->tahun && !$request->rt && !$request->rw) {
            $rt = $select_rt->first()->rt;
            $rw = $select_rw->first()->rw;
            $bulan = date('m');
            $tahun = date('Y');
            return redirect()->route('tagihan.index', ['rt' => $rt, 'rw' => $rw, 'bulan' => $bulan, 'tahun' => $tahun]);
        } else {
            $rt = $request->rt;
            $rw = $request->rw;
            $tahun = $request->tahun;
            $bulan = $request->bulan;
        }

        
        
        $tagihan = TagihanPembayaran::with(['pelanggan'])
        ->whereRelation('pelanggan', 'rt', '=', $rt)
        ->whereRelation('pelanggan', 'rw', '=', $rw)
        ->where('bulan', $bulan)->where('tahun', $tahun)
        ->paginate(20);

        return view('pages.tagihan_pembayaran.index', [
            'select_rt' => $select_rt,
            'select_rw' => $select_rw,
            'tagihan' => $tagihan
        ]);
        
    }

    public function create(Request $request, int $id_meteran) {
        $meteran = PencatatanMeteran::find($id_meteran);
        $tarifPerMeter3 = 5000;

        if ($meteran->bulan == 1) {
            $prevMonth = 12;
            $prevYear = $meteran->tahun - 1;
        } else {
            $prevMonth = $meteran->bulan - 1;
            $prevYear = $meteran->tahun;
        }

        $prevMeteran = PencatatanMeteran::where('bulan', $prevMonth)
            ->where('tahun', $prevYear)
            ->where('pelanggan_id', $meteran->pelanggan_id)
            ->first();


        if (!$prevMeteran) {
            return "Meteran pada bulan sebelumnya tidak valid atau belum tercatat";
        }
        $penggunaanAir = $meteran->angka_meteran - $prevMeteran->angka_meteran;

        $totalTagihan = $penggunaanAir * $tarifPerMeter3;
        $batasBayar = Carbon::now()->addDays(7)->format('Y-m-d');

        try {
            TagihanPembayaran::create([
                'pelanggan_id' => $meteran->pelanggan_id,
                'bulan' => $meteran->bulan,
                'tahun' => $meteran->tahun,
                'jumlah_pemakaian' => $penggunaanAir,
                'tarif_permeter' => $tarifPerMeter3,
                'total_tagihan' => $totalTagihan,
                'tgl_batas_bayar' => $batasBayar
            ]);

            return redirect()->back()->with([
                'toast-success' => 'Berhasil menerbitkan tagihan pelanggan ' . $meteran->pelanggan->no_pelanggan
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return 'Data sudah ada';
            } else {
                throw $e;
            }
        }
        
    }

    public function createAll(Request $request) {
        $request->validate([
            'rt' => 'required',
            'rw' => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        // dummy
        $tarifPerMeter = 2000;
        $batasBayar = Carbon::now()->addDays(7)->format('Y-m-d');

        $listPemakaian = PencatatanMeteran::from('pencatatan_meteran as m1')
        ->leftJoin('pencatatan_meteran as m2', function($join) {
            $join->on('m1.bulan', '=', DB::raw('m2.bulan + 1'))
                ->whereColumn('m1.tahun', 'm2.tahun')
                ->whereColumn('m1.pelanggan_id', 'm2.pelanggan_id')
                ->orWhere(function($query) {
                    $query->where('m1.bulan', '=', 1)
                        ->where('m2.bulan', '=', 12)
                        ->whereColumn('m1.tahun', DB::raw('m2.tahun + 1'))
                        ->whereColumn('m1.pelanggan_id', 'm2.pelanggan_id');
                });
        })
        ->join('pelanggan as p', 'm1.pelanggan_id', '=', 'p.id')
        ->where('m1.tahun', $request->tahun)
        ->where('m1.bulan', $request->bulan)
        ->where('p.rt', $request->rt)
        ->where('p.rw', $request->rw)
        ->select('m1.*', 'p.nama', 'p.no_pelanggan', 'm2.angka_meteran as angka_meteran_prev', DB::raw('(m1.angka_meteran - COALESCE(m2.angka_meteran,0)) as jumlah_pemakaian'))
        ->orderBy('m1.tahun')
        ->orderBy('m1.bulan')
        ->get();

        foreach ($listPemakaian as $pemakaian) {
            $totalTagihan = $pemakaian->jumlah_pemakaian * $tarifPerMeter;
            try {
                TagihanPembayaran::create([
                    'pelanggan_id' => $pemakaian->pelanggan_id,
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'jumlah_pemakaian' => $pemakaian->jumlah_pemakaian,
                    'tarif_permeter' => $tarifPerMeter,
                    'total_tagihan' => $totalTagihan,
                    'tgl_batas_bayar' => $batasBayar
                ]);
            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1062) {
                    $tagihan = TagihanPembayaran::where('bulan', $request->bulan)
                        ->where('tahun', $request->tahun)
                        ->where('pelanggan_id', $pemakaian->pelanggan_id)
                        ->first();
                    $tagihan->update([
                        'jumlah_pemakaian' => $pemakaian->jumlah_pemakaian,
                        'tarif_permeter' => $tarifPerMeter,
                        'total_tagihan' => $totalTagihan,
                        'tgl_batas_bayar' => $batasBayar
                    ]);
                } else {
                    throw $e;
                }
            }
        }

        return redirect()->back()->with([
            'toast-success' => 'Berhasil menerbitkan tagihan untuk '. $listPemakaian->count() .' pelanggan '
        ]);

    }

    public function confirmPayment(Request $request) {
        if (!$request->id) {
            return redirect()->back()->with('toast-error', 'Tagihan pembayaran gagal dikonfirmasi');
        }

        $tagihan = TagihanPembayaran::find($request->id);
        $tagihan->update([
            'status_pembayaran' => 'paid'
        ]);

        return redirect()->back()->with('toast-success', 'Tagihan pembayaran berhasil dikonfirmasi');
    }

    public function cetakKwitansiSemua(Request $request) {
        $rt = request('rt');
        $rw = request('rw');
        $bulan = request('bulan');
        $tahun = request('tahun');

        $list_tagihan = TagihanPembayaran::with(['pelanggan'])
        ->whereRelation('pelanggan', 'rt', '=', $rt)
        ->whereRelation('pelanggan', 'rw', '=', $rw)
        ->where('bulan', $bulan)->where('tahun', $tahun)
        ->get();

        $pdf = Pdf::loadView('pdf.kwitansi', compact('list_tagihan'));
        // $pdf->set_paper(array(0, 0, 595.27, 234), 'portrait');
        $pdf->setPaper('A4');

        return $pdf->stream('Kwitansi.pdf');
    }

    public function cetakKwitansiSatu(Request $request, $id) {
        $list_tagihan = TagihanPembayaran::with(['pelanggan'])
            ->where('id', $id)
            ->get();

        $pdf = Pdf::loadView('pdf.kwitansi', compact('list_tagihan'));
        $pdf->setPaper('A4');

        return $pdf->stream("Kwitansi.pdf");
    }
}
