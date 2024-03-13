<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\PencatatanMeteran;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PencatatanMeteranController extends Controller
{
    public function index(Request $request)
    {
        $rt = $request->rt;
        $rw = $request->rw;
        $month = $request->bulan;
        $year = $request->tahun;
        $select_rt = Pelanggan::select(['rt'])->distinct()->orderBy('rt')->get();
        $select_rw = Pelanggan::select(['rw'])->distinct()->orderBy('rw')->get();

        $list_pelanggan = null;
        if (isset($rt) && isset($rw) && isset($month) && isset($year)) {
            Session::put('pencatatan_meteran.rt', $rt);
            Session::put('pencatatan_meteran.rw', $rw);
            Session::put('pencatatan_meteran.bulan', $month);
            Session::put('pencatatan_meteran.tahun', $year);

            $list_pelanggan = Pelanggan::leftJoin('pencatatan_meteran AS a', function ($join) use ($month, $year) {
                $join->on('a.pelanggan_id', '=', 'pelanggan.id')
                    ->where('a.bulan', $month)->where('tahun', $year);
            })->select(['pelanggan.id', 'a.id as pencatatan_id', 'a.pelanggan_id', 'pelanggan.no_pelanggan', 'pelanggan.nama', 'a.angka_meteran', 'a.bulan', 'a.tahun', 'a.created_at'])
                ->where('rt', $rt)
                ->where('rw', $rw)
                ->orderBy('nama')
                ->get();
        }

        return view('pages.pencatatan_meteran.index', [
            'select_rt' => $select_rt,
            'select_rw' => $select_rw,
            'list_pelanggan' => $list_pelanggan
        ]);
    }

    public function show($id)
    {
        // $pelanggan = Pelanggan::find($id_pelanggan);
        // $year = date('Y');
        // $riwayat = PencatatanMeteran::from('pencatatan_meteran as m1')
        //     ->leftJoin(DB::raw('pencatatan_meteran as m2'), function ($join) {
        //         $join->on('m1.tahun', '=', 'm2.tahun')
        //             ->on('m1.bulan', '=', DB::raw('m2.bulan + 1'));
        //     })
        //     ->select('m1.*', DB::raw('m1.angka_meteran - COALESCE(m2.angka_meteran, 0) AS jml_pemakaian'))
        //     ->where('m1.tahun', $year)
        //     ->orderBy('m1.tahun')
        //     ->orderBy('m1.bulan')
        //     ->get();

        $data = PencatatanMeteran::find($id);

        return view('pages.pencatatan_meteran.show', [
            'data' => $data,
            'riwayat' => []
        ]);
    }

    public function catat(Request $request, Pelanggan $pelanggan)
    {
        $rt = $request->rt;
        $rw = $request->rw;
        $month = $request->bulan;
        $year = $request->tahun;

        $check = PencatatanMeteran::where('pelanggan_id', $pelanggan->id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first(['id', 'angka_meteran']);

        // $list_pelanggan = Pelanggan::where('rt', $request->rt)
        //     ->where('rw', $request->rw)
        //     ->orderBy('nama')
        //     ->get(['id', 'nama', 'no_pelanggan']);
        $list_pelanggan = Pelanggan::leftJoin('pencatatan_meteran AS a', function ($join) use ($month, $year) {
            $join->on('a.pelanggan_id', '=', 'pelanggan.id')
                ->where('a.bulan', $month)->where('tahun', $year);
        })->select(['pelanggan.id', 'pelanggan.no_pelanggan', 'pelanggan.nama', 'a.angka_meteran', 'a.bulan', 'a.tahun', 'a.created_at'])
            ->where('rt', $rt)
            ->where('rw', $rw)
            ->orderBy('nama')
            ->get();

        $currentIdx = $list_pelanggan->search(function ($row) use ($pelanggan) {
            return $row->id == $pelanggan->id;
        });

        $previousIndex = $currentIdx > 0 ? $currentIdx - 1 : null;
        $nextIndex = $currentIdx < $list_pelanggan->count() - 1 ? $currentIdx + 1 : null;

        $previousPelanggan = $previousIndex !== null ? $list_pelanggan[$previousIndex] : null;
        $nextPelanggan = $nextIndex !== null ? $list_pelanggan[$nextIndex] : null;

        return view('pages.pencatatan_meteran.catat', [
            'pelanggan' => $pelanggan,
            'is_sudah_dicatat' => $check,
            'list_pelanggan' => $list_pelanggan,
            'previous_pelanggan' => $previousPelanggan,
            'next_pelanggan' => $nextPelanggan
        ]);
    }

    public function catatAction(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'angka_meteran' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'foto' => 'required'
        ]);

        $image = $request->foto;
        $imageData = str_replace('data:image/png;base64,', '', $image);
        $fileName = uniqid() . '.png';
        $filePath = 'meteran/' . $fileName;
        $disk = Storage::disk('public')->put($filePath, base64_decode($imageData));

        try {
            PencatatanMeteran::create([
                'pelanggan_id' => $pelanggan->id,
                'angka_meteran' => $request->angka_meteran,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'petugas_id' => auth()->user()->id,
                'foto' => $filePath
            ]);

            return redirect()->back()->with([
                'alert-success' => 'Meteran dengan nomor pelanggan ' . $pelanggan->no_pelanggan . ' berhasil dicatat'
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // key sudah ada, lanjut update
                $update = PencatatanMeteran::where('pelanggan_id', $pelanggan->id)
                    ->where('bulan', $request->bulan)
                    ->where('tahun', $request->tahun)
                    ->first();
                $oldImage = $update->foto;
                $update->update([
                    'angka_meteran' => $request->angka_meteran,
                    'foto' => $filePath
                ]);

                Storage::disk('public')->delete($oldImage);
                return redirect()->back()->with([
                    'alert-success' => 'Meteran dengan nomor pelanggan ' . $pelanggan->no_pelanggan . ' berhasil diperbarui'
                ]);
            } else {
                throw $e;
            }
        }
    }
}
