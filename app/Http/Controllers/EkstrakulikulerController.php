<?php

namespace App\Http\Controllers;

use App\Helpers\Ekstraer;
use App\Models\Ekstra;
use App\Models\Ekstrakulikuler;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["ekstra"] = Ekstrakulikuler::all();
        return view('ekstrakulikuler', $data);
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
        $ekstra = Ekstra::all();
        return view('tambah_ekstrakulikuler',compact('siswa','kelas','ekstra'));
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
            'nis' => 'required','kelas' => 'required','ekstra' => 'required','semester' => 'required','nilai' => 'required',
        ]);

        $post = new Ekstrakulikuler();
        $eks = Ekstraer::IDGenerator(new Ekstrakulikuler(), 'id_ekstra', 3, 'E'); /** Generate id */
        $post->id_ekstra = $eks;
        $post->nis_id = $request->nis;
        $post->kelas_id = $request->kelas;
        $post->eks_id = $request->ekstra;
        $post->smtr = $request->semester;
        $post->nilai_ekstra = $request->nilai;
        $post->save();

        return redirect()->route('ekstrakulikuler.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function edit($ekstrakulikuler)
    {
        $ekstra = Ekstrakulikuler::where('id_ekstra', $ekstrakulikuler)->first();
        return view('edit_ekstrakulikuler',compact('ekstra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required',
        ]);

        $data = [
            'nilai_ekstra' => $request->nilai,
        ];
        Ekstrakulikuler::where('id_ekstra',$id)->update($data);

        return redirect()->route('ekstrakulikuler.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstrakulikuler  $ekstrakulikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy($ekstrakulikuler)
    {
        Ekstrakulikuler::where('id_ekstra', $ekstrakulikuler)->delete();
        return redirect()->route('ekstrakulikuler.index')->with('status','Data Berhasil Dihapus');
    }
}
