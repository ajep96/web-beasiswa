<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{

    public function index()
    {
        $headerTitle = 'Pilih Beasiswa';
        return view( 'pages.pilih-beasiswa.index', compact( 'headerTitle' ) );
    }

    public function hasil()
    {
        $dataBeasiswa = Beasiswa::all();
        $headerTitle = 'Total Pendaftar Beasiswa';
        return view( 'pages.hasil.index', compact( 'headerTitle', 'dataBeasiswa') );
    }

}
