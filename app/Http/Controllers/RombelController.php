<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rombel = Rombel::latest()->paginate(5);

        return view('Rombel.index',compact('Rombel'));
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
        $cek = Rombel::where('jurusan', $r->tingkat.'-'.$r->jurusan)->first();
        switch ($cek) {
            case false:
                Rombel::create([
                    'jurusan' => $r->tingkat.'-'.$r->jurusan,
                    'ketua_produktif' => $r->ketua_produktif,
                ]);
                return redirect()->back()->with('success', 'Data berhasil dibuat');
                break;
            
            default:
            return redirect()->back()->with('gagal', 'Data gagal dibuat');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $Rombel)
    {
        $Rombel->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
