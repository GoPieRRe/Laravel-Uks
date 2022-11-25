<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use DB;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Obat = Obat::latest()->paginate(7);

        return view('Obat.index', compact('Obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        Obat::create([
            'nama_obat' => $r->nama_obat,
            'jenis' => $r->jenis,
            'fungsi' => $r->fungsi,
            'stok' => $r->stok,
        ]);

        return redirect()->route('Obat.index')->with('success', "Obat Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $Obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $Obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Obat $Obat)
    {
       $cek = $r->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'fungsi' => 'required',
            'stok' => 'required',
        ]);
        $ceks = $Obat->update($r->all());
        if ($ceks) { 
        return redirect()->route('Obat.index')->with('success', "Obat Berhasil diubah!");
        }else{
            return redirect()->route('Obat.index')->with('gagal', "Obat gagal diubah!");
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $Obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $Obat)
    {

        $Obat->delete();
        return redirect()->route('Obat.index')->with('success', "Obat Berhasil Dihapus!");
    }
}
