<?php

namespace App\Http\Controllers;
// Memanggil model Beasiswa dan Mahasiswa
use App\Models\Beasiswa;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // Fungsi untuk menampilkan halaman pilih beasiswa
    public function index()
    {
        //Mendeklarasikan variabel headerTitle dengan nilai 'Pilih Beasiswa'
        $headerTitle = 'Pilih Beasiswa';
        // Mengambil data dari tabel Beasiswa dan mempassing ke view index
        // Mengembalikan view 'pages.pilih-beasiswa.index' dengan passing variabel headerTitle
        return view( 'pages.pilih-beasiswa.index', compact( 'headerTitle' ) );
    }

    // Fungsi untuk menampilkan halaman hasil pendaftaran beasiswa
    public function hasil()
    {
        // Mendapatkan semua data beasiswa dari model Beasiswa
        $dataBeasiswa = Beasiswa::all();
        // Mengirimkan data beasiswa ke view pages.hasil-pendaftaran.index
        // Mendeklarasikan variabel headerTitle dengan nilai 'Total Pendaftar Beasiswa'
        $headerTitle = 'Total Pendaftar Beasiswa';
        // Menyimpan jumlah mahasiswa yang terdaftar di setiap beasiswa dalam array $jml_mahasiswa[]
        // Mengembalikan view 'pages.hasil.index' dengan passing variabel headerTitle dan dataBeasiswa
        return view( 'pages.hasil.index', compact( 'headerTitle', 'dataBeasiswa') );
    }

}
