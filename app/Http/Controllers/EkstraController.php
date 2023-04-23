<?php

namespace App\Http\Controllers;

use App\Helpers\Ekser;
use App\Models\Ekstra;
use Illuminate\Http\Request;

class EkstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["eks"] = Ekstra::all();
        return view('eks', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_eks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekstra' => 'required',
        ]);

        $post = new Ekstra();
        $eks = Ekser::IDGenerator(new Ekstra(), 'id_eks', 3, 'EK'); /** Generate id */
        $post->id_eks = $eks;
        $post->nama_ekstra = $request->nama_ekstra;
        $post->save();

        return redirect()->route('eks.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstra  $ekstra
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstra $ekstra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstra  $ekstra
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstra $ekstra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekstra  $ekstra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekstra $ekstra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstra  $ekstra
     * @return \Illuminate\Http\Response
     */
    public function destroy($ek)
    {
        Ekstra::where('id_eks', $ek)->delete();
        return redirect()->route('eks.index')->with('status','Data Berhasil Dihapus');
    }
}
