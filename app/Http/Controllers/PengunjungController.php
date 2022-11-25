<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pengunjung = pengunjung::latest()->paginate(7);
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        return view('Pengunjung.index', compact('Pengunjung','rombel','rayon'));
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
        $cek = Pengunjung::where('NIS',  $r->NIS)->first();
        switch ($cek) {
            case false:
                Pengunjung::create([
                    'NIS' => $r->NIS,
                    'nama' => $r->nama,
                    'rayon' => $r->rayon,
                    'rombel' => $r->rombel
                ]);
        
                return redirect()->route('Pengunjung.index')->with('success', "Pengunjung berhasil ditambah!");
                break;
            
            default:
                return redirect()->back()->with('gagal', "NIS sudah ada!");
                break;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengunjung  $Pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $Pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengunjung  $Pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $Pengunjung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengunjung  $Pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Pengunjung $Pengunjung)
    {
        $cek = $r->validate([
            'NIS' => 'required',
            'nama' => 'required',
            'rayon' => 'required',
            'rombel' => 'required',
        ]);
        // dd($cek);
        $ceks = $Pengunjung->update($r->all());
        if ($ceks) {
            return redirect()->route('Pengunjung.index')->with('success', "Pengunjung berhasil diubah!");
        }else{
            return redirect()->route('Pengunjung.index')->with('gagal', "Pengunjung gagal diubah!");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengunjung  $Pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengunjung $Pengunjung)
    {
        $Pengunjung->delete();

        return redirect()->route('Pengunjung.index')->with('success', "data berhasil dihapus!");
    }
}
