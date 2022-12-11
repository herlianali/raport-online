<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data1['kelas'] = Kelas::all();
        $data2['mapel'] = Mapel::all();
        return view('home', $data1, $data2);
    }
}
