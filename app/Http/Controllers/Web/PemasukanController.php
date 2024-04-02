<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasukan = Pemasukan::latest()->paginate(20);

        return view('pages.pemasukan.index', compact('pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pemasukan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
        ]);

        Pemasukan::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pemasukan.index')->with('toast-success', 'Berhasil menambah data pemasukkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemasukan = Pemasukan::find($id);

        return view('pages.pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemasukan = Pemasukan::find($id);
        
        return view('pages.pemasukan.edit', compact('pemasukan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
        ]);

        Pemasukan::find($id)->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pemasukan.index')->with('toast-success', 'Berhasil memperbarui data pemasukkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemasukan::find($id)->delete();

        return redirect()->back()->with('toast-success', 'Data pemasukan berhasil dihapus');
    }
}
