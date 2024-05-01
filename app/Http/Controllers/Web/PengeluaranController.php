<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pengeluaran = Pengeluaran::search($request->search ?? '')->latest()->paginate(20);

        return view('pages.pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengeluaran.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
            'pic' => 'required'
        ]);

        Pengeluaran::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'pic' => $request->pic,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pengeluaran.index')->with('toast-success', 'Berhasil menambah data pengeluaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return view('pages.pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengeluaran = Pengeluaran::find($id);
        
        return view('pages.pengeluaran.edit', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
            'pic' => 'required'
        ]);

        Pengeluaran::find($id)->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'pic' => $request->pic,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('pengeluaran.index')->with('toast-success', 'Berhasil memperbarui data pemasukkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengeluaran::find($id)->delete();

        return redirect()->back()->with('toast-success', 'Data pengeluaran berhasil dihapus');
    }
}
