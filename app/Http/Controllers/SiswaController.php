<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["siswa"] = Siswa::all();
        return view('siswa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('tambah_siswa', compact('kelas'));
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
            'nis' => ['required', 'string', 'max:16', 'unique:siswas'], 'nisn' => ['string', 'max:16', 'unique:siswas'],'nama' => 'required','tgl_lahir' => 'required', 'tpt_lahir' => 'required', 'alamat' => 'required', 'foto' => ['required','file', 'image', 'max:2000'], 'jenis_kelamin' => ['required','in:P,L'], 'tlp' => 'required', 'kelas' => 'required', 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->hasFile('foto');

        // gunakan slug helper agar "nama" bisa di pakai sebagai dari nama foto
        $slug =  Str::slug($request['nama']);

        // ambil extensi file asli
        $extFile = $request->foto->getClientOriginalExtension();

        // Generate nama gambar, gabungan dari slug "nama" + time()+extensi
        $namaFile = $slug.'-'.time().".".$extFile;

        // proses upload, simpan ke dalam folder "upload"
        $request->file('foto')->storeAs('public/siswas',$namaFile);
        // $path = $request->file('foto')->store('public/uploads');

        $post = new Siswa();
        $post->nis = $request->nis;
        $post->nisn = $request->nisn;
        $post->nama = $request->nama;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->tpt_lahir = $request->tpt_lahir;
        $post->alamat = $request->alamat;
        $post->foto = $namaFile;
        $post->jenis_kelamin = $request->jenis_kelamin;
        $post->tlp = $request->tlp;
        $post->kelas = $request->kelas;
        $post->password = $request->password;
        $post->save();

        return redirect()->route('siswa.index')->with('status', 'Data Telah di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('edit_siswa',compact('siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required','tgl_lahir' => 'required', 'tpt_lahir' => 'required', 'alamat' => 'required',  'jenis_kelamin' => ['required','in:P,L'], 'tlp' => 'required', 'kelas' => 'required', 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $post = Siswa::find($id);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required','file', 'image', 'max:2000',
            ]);

            // gunakan slug helper agar "nama" bisa di pakai sebagai dari nama foto
            $slug = Str::slug($request['nama']);

            // ambil extensi file asli
            $extFile = $request->foto->getClientOriginalExtension();

            // Generate nama gambar, gabungan dari slug "nama" + time()+extensi
            $namaFile = $slug.'-'.time().".".$extFile;

            // proses upload, simpan ke dalam folder "upload"
            $request->file('foto')->storeAs('public/siswas',$namaFile);
            // $path = $request->file('foto')->store('public/uploads');

            $post->foto = $namaFile;

        }

        $post->nisn = $request->nisn;
        $post->nama = $request->nama;
        $post->tgl_lahir = $request->tgl_lahir;
        $post->tpt_lahir = $request->tpt_lahir;
        $post->alamat = $request->alamat;
        $post->jenis_kelamin = $request->jenis_kelamin;
        $post->tlp = $request->tlp;
        $post->kelas = $request->kelas;
        $post->password = $request->password;
        $post->save();

        return redirect()->route('siswa.index')->with('status', 'Data Telah di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $avatar = Siswa::findOrFail($siswa->id);

        if(Storage::delete('public/siswas/'.$avatar->foto)) {
            $avatar->delete();
        }

        return redirect()->route('siswa.index')
            ->with('status','Data Berhasil Dihapus');
    }
}
