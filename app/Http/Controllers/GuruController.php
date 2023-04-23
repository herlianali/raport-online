<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["guru"] = Guru::all();
        return view('guru', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('tambah_guru', compact('mapel'));
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
            'nip' => ['required', 'string', 'max:16', 'unique:gurus'],        'nama' => 'required','tgl_lahir' => 'required', 'tpt_lahir' => 'required', 'alamat' => 'required', 'foto' => ['required','file', 'image', 'max:2000'], 'jenis_kelamin' => ['required','in:P,L'], 'tlp' => 'required', 'mapel' => 'required', 'status_wali' => ['required','in:1,0'], 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->hasFile('foto');

        // gunakan slug helper agar "nama" bisa di pakai sebagai dari nama foto
        $slug = Str::slug($request['nama']);

        // ambil extensi file asli
        $extFile = $request->foto->getClientOriginalExtension();

        // Generate nama gambar, gabungan dari slug "nama" + time()+extensi
        $namaFile = $slug.'-'.time().".".$extFile;

        // proses upload, simpan ke dalam folder "upload"
        $request->file('foto')->storeAs('public/gurus',$namaFile);
        // $path = $request->file('foto')->store('public/uploads');

        $post = new Guru;
        $post->nip = $request->nip;
        $post->nama = $request->nama;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->tpt_lahir = $request->tpt_lahir;
        $post->alamat = $request->alamat;
        $post->foto = $namaFile;
        $post->jenis_kelamin = $request->jenis_kelamin;
        $post->tlp = $request->tlp;
        $post->mapel_id = $request->mapel;
        $post->status_wali = $request->status_wali;
        $post->password = $request->password;
        $post->save();

        return redirect()->route('guru.index')->with('status', 'Data Telah di Simpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($guru)
    {
        $mapel = Mapel::all();
        $guru = Guru::where('nip', $guru)->first();
        return view('edit_guru',compact('mapel', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required','tgl_lahir' => 'required', 'tpt_lahir' => 'required', 'alamat' => 'required',  'jenis_kelamin' => ['required','in:P,L'], 'tlp' => 'required', 'mapel' => 'required', 'status_wali' => ['required','in:1,0'], 'password' => ['required', 'string', 'min:8', 'confirmed'],'foto' => 'required','file', 'image', 'max:2000',
        ]);
        $slug = Str::slug($request['nama']);

        // ambil extensi file asli
        $extFile = $request->foto->getClientOriginalExtension();

        // Generate nama gambar, gabungan dari slug "nama" + time()+extensi
        $namaFile = $slug.'-'.time().".".$extFile;

        // proses upload, simpan ke dalam folder "upload"
        $request->file('foto')->storeAs('public/gurus',$namaFile);

        $data = [
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'tpt_lahir' => $request->tpt_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
            'mapel_id' => $request->mapel,
            'status_wali' => $request->status_wali,
            'password' => $request->password,
            'foto' => $namaFile,
        ];
        Guru::where('nip',$id)->update($data);

        return redirect()->route('guru.index')->with('status', 'Data Telah di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($guru)
    {

        $avatar = Guru::where('nip', $guru)->first();
        if(Storage::delete('public/gurus/'.$avatar->foto)) {
            Guru::where('nip', $guru)->delete();
        }

        return redirect()->route('guru.index')
            ->with('status','Data Berhasil Dihapus');
    }
}
