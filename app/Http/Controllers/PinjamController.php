<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = Pinjam::all();
        return view('pinjam.index', compact('pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all('id', 'name');
        $barang = Barang::all('id', 'nama');
        return view('pinjam.create', compact('users','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'peminjam'=>'integer|required',
            'barang'=>'integer|required',
            'jumlah'=>'integer|required',
            'tgl_pinjam'=>'string|required',
            'tgl_kembali'=>'string|required',
            'surat'=>'file|required',
            'status'=>'string|required',
            'keterangan'=>'string|nullable'
        ]);
        $surat = $request->file('surat');
        
$data['surat'] =$surat->store('upload');
            $user = User::findOrFail($data['peminjam']);
            $barang = Barang::findOrFail($data['barang']);
            $pinjam = Pinjam::create($data);
        return redirect(route('pinjam.index'));
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
    {$users = User::all('id', 'name');
        $barang = Barang::all('id', 'nama');
        $pinjam = Pinjam::findOrFail($id);
        return view('pinjam.edit')->with('pinjam', $pinjam)->with('barang', $barang)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->validate($request, [
            'peminjam'=>'integer|required',
            'barang'=>'integer|required',
            'jumlah'=>'integer|required',
            'tgl_pinjam'=>'string|required',
            'tgl_kembali'=>'string|required',
            'surat'=>'file|required',
            'status'=>'string|required',
            'keterangan'=>'string|nullable'
        ]);
            $p = Pinjam::findOrFail($id);
            $p->update($data);
        return redirect(route('pinjam.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pinjam = Pinjam::where('id', $id)->firstorfail()->delete();
          echo ("User Record deleted successfully.");
          return redirect()->route('pinjam.index');
    }
}