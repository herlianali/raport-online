<?php

namespace App\Http\Controllers;

use App\Helpers\Mapeler;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["mapel"] = Mapel::all();
        return view('mapel', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_mapel');
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
            'nama_mapel' => 'required',
        ]);

        $post = new Mapel();
        $mapel = Mapeler::IDGenerator(new Mapel, 'id_mapel', 3, 'MP'); /** Generate id */
        $post->id_mapel = $mapel;
        $post->nama_mapel = $request->nama_mapel;
        $post->save();

        return redirect()->route('mapel.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mapel)
    {

        Mapel::where('id_mapel', $id_mapel)->delete();
        return redirect()->route('mapel.index')->with('status','Data Berhasil Dihapus');
    }
}
