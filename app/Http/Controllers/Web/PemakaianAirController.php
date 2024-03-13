<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\PencatatanMeteran;
use DB;
use Illuminate\Http\Request;

class PemakaianAirController extends Controller
{
    public function index(Request $request) {
        $select_rt = Pelanggan::select(['rt'])->distinct()->orderBy('rt')->get();
        $select_rw = Pelanggan::select(['rw'])->distinct()->orderBy('rw')->get();

        if (!$request->bulan && !$request->tahun && !$request->rt && !$request->rw) {
            return view('pages.pemakaian_air.index', [
                'select_rt' => $select_rt,
                'select_rw' => $select_rw,
            ]);
        }
        
        $rt = $request->rt;
        $rw = $request->rw;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $penggunaan = PencatatanMeteran::from('pencatatan_meteran as m1')
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
        ->where('m1.tahun', $tahun)
        ->where('m1.bulan', $bulan)
        ->where('p.rt', $rt)
        ->where('p.rw', $rw)
        ->select('m1.*', 'p.nama', 'p.no_pelanggan', 'm2.angka_meteran as angka_meteran_prev', DB::raw('(m1.angka_meteran - COALESCE(m2.angka_meteran,0)) as penggunaan_air'))
        ->orderBy('m1.tahun')
        ->orderBy('m1.bulan')
        ->get();

        return view('pages.pemakaian_air.index', [
            'select_rt' => $select_rt,
            'select_rw' => $select_rw,
            'penggunaan' => $penggunaan
        ]);
    }
}
