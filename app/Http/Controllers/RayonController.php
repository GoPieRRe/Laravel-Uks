<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rayon = Rayon::latest()->paginate(5);

        return view('Rayon.index',compact('Rayon'));
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
        $cek = Rayon::where('nama_rayon', $r->nama_rayon)->first();
        switch ($cek) {
            case false:
                
            Rayon::create([
                'nama_rayon' => $r->nama_rayon,
                'pembimbing' => $r->pembimbing,
                'no_hp' => $r->no_hp,
            ]);

            return redirect()->back()->with('success', "Rayon berhasil dibuat");
                break;
            
            default:
            return redirect()->back()->with('gagal', 'Data rayon sudah ada');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $Rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $Rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $Rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $Rayon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rayon  $Rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Rayon $Rayon)
    {
        $cek = Rayon::where('nama_rayon', $r->nama_rayon)->first();
        switch ($cek) {
            case false:
                $r->validate([
                    'nama_rayon' => 'required',
                    'pembimbing' => 'required',
                    'no_hp' => 'required'
                ]);

                $Rayon->update($r->all());
                return redirect()->back()->with('success', 'Data berhasil diupdate');
                break;
            
            default:
            return redirect()->back()->with('gagal', 'Data gagal diupdate');
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $Rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $Rayon)
    {
        $cek = $Rayon->delete();
        // dd($cek);   

        return redirect()->back()->with('success', "Rayon berhasil Dihapus");
    }
}
