<?php

namespace App\Http\Controllers;

use App\Helpers\Kder;
use App\Models\Kd;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["kd"] = Kd::all();
        return view('kd', $data);
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
        return view('tambah_kd',compact('siswa','kelas'));
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
            'nis' => 'required','kelas' => 'required','semester' => 'required','nilai' => 'required',
        ]);

        $post = new Kd();
        $kd = Kder::IDGenerator(new Kd(), 'id_kd', 3, 'KD'); /** Generate id */
        $post->id_kd = $kd;
        $post->nis_id = $request->nis;
        $post->kelas_id = $request->kelas;
        $post->smtr = $request->semester;
        $post->nilai_kd = $request->nilai;
        $post->save();

        return redirect()->route('kd.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function show(Kd $kd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function edit($kd)
    {
        $kd = Kd::where('id_kd', $kd)->first();
        return view('edit_kd',compact('kd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        $data = [
            'nilai_kd' => $request->nilai,
        ];
        Kd::where('id_kd',$id)->update($data);

        return redirect()->route('kd.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd)
    {
        Kd::where('id_kd', $kd)->delete();
        return redirect()->route('kd.index')->with('status','Data Berhasil Dihapus');
    }
}
