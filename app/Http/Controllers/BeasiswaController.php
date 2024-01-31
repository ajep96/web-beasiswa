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
    public function index()
    {
        $headerTitle = 'Daftar Beasiswa';
        return view( 'pages.daftar.index', compact( 'headerTitle' ) );
    }

    public function store( Request $request ): RedirectResponse
    {
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

        $sudahDaftar = Beasiswa::where( 'mahasiswa_id', $mahasiswaId )
            ->where( 'daftar_beasiswa_id', $beasiswaId )
            ->exists();

        if ( $sudahDaftar ) {
            throw ValidationException::withMessages( [ 
                'nim' => 'Mahasiswa sudah terdaftar untuk beasiswa ini.',
            ] );
        }

        $data = [ 
            'mahasiswa_id'       => $mahasiswaId,
            'daftar_beasiswa_id' => $beasiswaId,
            'semester'           => $request->semester,
            'beasiswa'           => $request->beasiswa,
        ];

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

    public function show( int $nim )
    {
        $mahasiswa = Mahasiswa::where( 'nim', $nim )->first();
        return response()->json( $mahasiswa );
    }
}
