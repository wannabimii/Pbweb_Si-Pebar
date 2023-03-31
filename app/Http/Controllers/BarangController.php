<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nama'=>'string|required',
            'deskripsi'=>'string|nullable',
            'kondisi'=>'string|required',
            'jumlah'=>'integer|required'
        ]);

        Barang::create($data);
        return redirect(route('barang.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit')->with('barang', $barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->validate($request, [
            'nama'=>'string|required',
            'deskripsi'=>'string|nullable',
            'kondisi'=>'string|required',
            'jumlah'=>'integer|required'
        ]);
            $b = Barang::findOrFail($id);
            $b->update($data);
        return redirect(route('barang.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::where('id', $id)->firstorfail()->delete();
          echo ("User Record deleted successfully.");
          return redirect()->route('barang.index');
    }
}