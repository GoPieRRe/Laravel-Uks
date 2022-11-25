<?php

namespace App\Http\Controllers;

use App\Models\{Kunjungan,Pengunjung,Obat,view_kunjungan};
use Illuminate\Http\Request;
use Carbon\Carbon;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kunjungan = Kunjungan::latest()->paginate(7);
        $Pengunjung = Pengunjung::all();
        $Obat = Obat::all();
        $view = view_kunjungan::all();
        return view('Kunjungan.index',compact('view','Kunjungan','Pengunjung','Obat'));
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
        $cek = Obat::where('nama_obat', $r->nama_obat)->first();
        if ($r->keperluan == "istirahat") {
            Kunjungan::create([
                'NIS' => $r->NIS,
                'tgl_kunjungan' => Carbon::now(),
                'keperluan' => $r->keperluan,
                'nama_obat' => 'none',
                'stok' => 'none',
            ]);
            return redirect()->route('Kunjungan.index')->with('success', "Berhasil diinput!");
        }else{
            if ($cek->stok < $r->stok) {
                return redirect()->back()->with('gagal', 'Stok Obat tidak memadai');
            }else{
            Kunjungan::create([
                'NIS' => $r->NIS,
                'tgl_kunjungan' => Carbon::now(),
                'keperluan' => $r->keperluan,
                'nama_obat' => $r->nama_obat,
                'stok' => $r->stok,
            ]);

            return redirect()->route('Kunjungan.index')->with('success', "Berhasil diinput!");
    }}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $Kunjungan)
    {
        $Kunjungan->delete();
        return redirect()->route('Kunjungan.index')->with('success', "Berhasil dihapus!");
    }
}
