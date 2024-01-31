<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\DaftarBeasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BeasiswaController extends Controller
{
    // Tampilan halaman utama daftar beasiswa
    public function index()
    {
        $headerTitle = 'Daftar Beasiswa';
        return view( 'pages.daftar.index', compact( 'headerTitle' ) );
    }

    // Fungsi untuk menyimpan data pendaftaran beasiswa
    public function store( Request $request ): RedirectResponse
    {
        // Validasi data yang dikirimkan dari form
        $request->validate( [ 
            'nama'     => [ 'required', 'exists:mahasiswas,nama' ],
            'email'    => [ 'required', 'email', 'exists:mahasiswas,email' ],
            'nim'      => [ 'required', 'numeric', 'exists:mahasiswas,nim' ],
            'noHp'     => [ 'required', 'numeric', 'exists:mahasiswas,no_hp' ],
            'semester' => [ 'required', 'numeric' ],
            'ipk'      => [ 'required', 'numeric', 'exists:mahasiswas,ipk' ],
            'beasiswa' => [ 'required' ],
            'berkas'   => [ 'required', 'file', 'mimes:pdf,jpg,jpeg,png' ],
        ] );
        
        $mahasiswaId = Mahasiswa::where( 'nim', $request->nim )->first()->id;
        $beasiswaId  = DaftarBeasiswa::where( 'nama_beasiswa', $request->beasiswa )->first()->id;

        // Memeriksa apakah mahasiswa sudah terdaftar untuk beasiswa tersebut
        $sudahDaftar = Beasiswa::where( 'mahasiswa_id', $mahasiswaId )
            ->where( 'daftar_beasiswa_id', $beasiswaId )
            ->exists();
        
        if ( $sudahDaftar ) {
            throw ValidationException::withMessages( [ 
                'nim' => 'Mahasiswa sudah terdaftar untuk beasiswa ini.',
            ] );
        }
        
        // Membuat data pendaftaran beasiswa
        $data = [ 
            'mahasiswa_id'       => $mahasiswaId,
            'daftar_beasiswa_id' => $beasiswaId,
            'semester'           => $request->semester,
            'beasiswa'           => $request->beasiswa,
        ];

        // Menyimpan berkas ke folder "public/uploads" dan mengambil nama filenya
        // Menyimpan file berkas pendaftaran
        if ( $request->hasFile( 'berkas' ) ) {
            $berkas     = $request->file( 'berkas' );
            $namaBerkas = time() . '_' . $berkas->getClientOriginalName();
            $berkas->move( public_path( 'berkas' ), $namaBerkas );

            Beasiswa::create( $data + [ 'berkas' => $namaBerkas ] );

            return redirect()->route( 'hasil' )->with( 'success', 'Data Berhasil diinputkan' );
        }
        else {
            return redirect()->route( 'hasil' )->with( 'error', 'Data Gagal diinputkan, lengkapi data terlebih dahulu' );
        }
    }

    // Fungsi untuk menampilkan data mahasiswa berdasarkan nim
    public function show( int $nim )
    {
        // Mendapatkan data mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::where( 'nim', $nim )->first();
        // Mengembalikan data mahasiswa dalam format JSON
        return response()->json( $mahasiswa );
    }
}
