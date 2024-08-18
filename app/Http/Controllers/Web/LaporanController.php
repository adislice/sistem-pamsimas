<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\PencatatanMeteran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request) {
        $select_rt = Pelanggan::select(['rt'])->distinct()->orderBy('rt')->get();
        $select_rw = Pelanggan::select(['rw'])->distinct()->orderBy('rw')->get();

        return view('pages.laporan.index', [
            'select_rt' => $select_rt,
            'select_rw' => $select_rw,
        ]);
    }

    public function cetakPemakaianAir(Request $request) {
        $rt = $request->rt;
        $rw = $request->rw;
        $tahun = $request->tahun;
        $list_pemakaian = [];
        
        for ($bulan=1; $bulan <= 12; $bulan++) { 
            $pemakaian = PencatatanMeteran::from('pencatatan_meteran as m1')
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
                ->leftjoin('pelanggan as p', 'm1.pelanggan_id', '=', 'p.id')
                ->where('m1.tahun', $tahun)
                ->where('m1.bulan', $bulan)
                ->where('p.rt', $rt)
                ->where('p.rw', $rw)
                ->select('m1.*', 'p.nama', 'p.no_pelanggan', 'm2.angka_meteran as angka_meteran_prev', DB::raw('(m1.angka_meteran - COALESCE(m2.angka_meteran,0)) as jumlah_pemakaian'))
                ->orderBy('m1.tahun')
                ->orderBy('m1.bulan')
                ->get();

                foreach ($pemakaian as $row) {
                    $list_pemakaian[$row->pelanggan_id]['id'] = $row->pelanggan_id;
                    $list_pemakaian[$row->pelanggan_id]['nama'] = $row->nama;
                    $list_pemakaian[$row->pelanggan_id]['no_pelanggan'] = $row->no_pelanggan;
                    $list_pemakaian[$row->pelanggan_id]['pemakaian'][$bulan] = $row->jumlah_pemakaian;
                }

                
        }
        $info = (object) ['rt' => $rt, 'rw' => $rw, 'tahun' => $tahun ];
        
        $pdf = Pdf::loadView('pdf.laporan_pemakaian_air', [
            'list_pemakaian' => $list_pemakaian,
            'info' => $info
        ]);
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream('laporan.pdf');
    }
}
