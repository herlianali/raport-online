<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'string', 'max:16', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:-10 years', 'after:-100 years'],
            'tempat_lahir' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string', 'max:255'],
            'foto' => ['sometimes', 'file', 'image', 'max:2000'],
            'jenis_kelamin' => ['required','in:P,L'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Ambil request object untuk proses upload file
        $request = request();

        // proses uploads file gambar profil
        if ($request->hasFile('foto')) {

            // gunakan slug helper agar "nama" bisa di pakai sebagai dari nama foto
            $slug = Str::slug($data['nama']);

            // ambil extensi file asli
            $extFile = $request->foto->getClientOriginalExtension();

            // Generate nama gambar, gabungan dari slug "nama" + time()+extensi
            $namaFile = $slug.'-'.time().".".$extFile;

            // proses upload, simpan ke dalam folder "upload"
            $request->file('foto')->storeAs('public/uploads',$namaFile);
            // $path = $request->file('foto')->store('public/uploads');
        }
        else {
            // jika user tidak mengupload gambar, isi dengan gambar default
            $namaFile = 'default_profile.jpg';
        }
        // input data ke database
        return User::create([
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'alamat' => $data['alamat'],
            'foto' => $namaFile,
            'jenis_kelamin' => $data['jenis_kelamin'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
