<?php

namespace App\Http\Controllers;

use App\Helpers\Nilaier;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["nilai"] = Nilai::all();
        return view('nilai', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('tambah_nilai',compact('siswa','kelas','mapel'));
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
            'nis' => 'required','kelas' => 'required','mapel' => 'required','semester' => 'required','nilai' => 'required',
        ]);

        $post = new Nilai();
        $niler = Nilaier::IDGenerator(new Nilai(), 'id_nilai', 3, 'N'); /** Generate id */
        $post->id_nilai = $niler;
        $post->nis_id = $request->nis;
        $post->kelas_id = $request->kelas;
        $post->mapel_id = $request->mapel;
        $post->smtr = $request->semester;
        $post->nilai_smtr = $request->nilai;
        $post->save();

        return redirect()->route('nilai.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit($nilai)
    {
        $nilai = Nilai::where('id_nilai', $nilai)->first();
        return view('edit_nilai',compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        $data = [
            'nilai_smtr' => $request->nilai,
        ];
        Nilai::where('id_nilai',$id)->update($data);

        return redirect()->route('nilai.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($nilai)
    {
        Nilai::where('id_nilai', $nilai)->delete();
        return redirect()->route('nilai.index')->with('status','Data Berhasil Dihapus');
    }
}
