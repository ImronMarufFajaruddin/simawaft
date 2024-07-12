<?php

namespace App\Http\Controllers\Landings;

use App\Models\User;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use App\Models\Admin\Instansi;
use App\Models\Landing\HeroModel;
use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriInstansi;
use App\Models\Landing\Footer;

class LandingController extends Controller
{
    public function index()
    {

        $dataHero = HeroModel::first();
        $dataFooter = Footer::all();

        $dataKategoriInstansi = KategoriInstansi::all();
        $dataInstansi = Instansi::with('kategoriInstansi')->get();
        $dataBerita = Berita::latest()->take(4)->get();
        $dataUser = User::all();
        return view('landings-page.index', compact('dataInstansi', 'dataBerita', 'dataKategoriInstansi', 'dataUser', 'dataHero', 'dataFooter'));
    }
}
