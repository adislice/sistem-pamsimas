<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::search($request->search ?? '')
            ->isAktif($request->status)
            ->latest()->get();

        return view('pages.pelanggan.index', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function create()
    {
        return view('pages.pelanggan.add', [
            'back_link' => route('pelanggan.index')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'no_telepon' => 'required|numeric',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'is_aktif' => 'required'
        ]);

        $no_pelanggan = Pelanggan::getNoPelanggan();

        $result = Pelanggan::create([
            'nama' => $request->nama,
            'no_pelanggan' => $no_pelanggan,
            'no_telepon' => $request->no_telepon,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'is_aktif' => $request->is_aktif,
            'password' => Hash::make('kalibaros')
        ]);

        if ($result) {
            return redirect()->route('pelanggan.index')->with('toast-success', 'Berhasil menambah data pelanggan');
        } else {
            return redirect()->back()->with('toast-error', "Gagal menambah pelanggan baru")->withInput($request->all());
        }
    }

    public function edit(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        return view('pages.pelanggan.edit', ['pelanggan' => $pelanggan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'no_telepon' => 'required|numeric',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'is_aktif' => 'required'
        ]);

        Pelanggan::find($id)->update($request->all());

        return redirect()->route('pelanggan.index')->with('toast-success', 'Data pelanggan berhasil diubah');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        return view('pages.pelanggan.show', ['pelanggan' => $pelanggan]);
    }

    public function destroy($id)
    {
        Pelanggan::find($id)->delete();

        return redirect()->back()->with('toast-success', 'Data pelanggan berhasil dihapus');
    }
}
