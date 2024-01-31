@extends('template')
@section('title', 'Pilih Beasiswa')
@section('content')
    <section class="row gap-3 justify-content-center">
        <article class="col-md-3 pl-5 text-center border border-secondary rounded-4 py-4">
            <div class="d-flex flex-column justify-content-between h-100">
                <h2>Beasiswa Akademik</h2>
                <p class="fw-light">Beasiswa Akademik merupakan salah satu bentuk upaya kami dalam meningkatkan
                    aksesibilitas pendidikan tinggi bagi masyarakat Indonesia. Beasiswa ini diberikan kepada
                    mahasiswa aktif dan berprestasi.</p>
                <div>
                    <a href="{{ route('daftar.index') }}" class="btn btn-primary px-4 fw-medium">Daftar</a>
                </div>
            </div>
        </article>
        <article class="col-md-6 border border-secondary rounded-4 py-4">
            <h2 class="text-center">Syarat dan Ketentuan Penerima Beasiswa Akademik</h2>
            <p class="text-center fw-light">Beasiswa non-akademik adalah bantuan keuangan yang diberikan
                kepada mahasiswa yang tidak didasarkan pada prestasi akademik</p>
            <div>
                <ul class="fw-light">
                    <li>Memiliki prestasi akademik/non akademik tingkat internasional atau nasional yang
                        terbukti dengan sertifikat.</li>
                    <li>Mendapatkan rekomendasi dari institusi terkait.</li>
                    <li>Tidak sedang menerima beasiswa serupa dari sumber lain.</li>
                    <li>Belum pernah menempuh pendidikan pada jenjang yang sama.</li>
                    <li>Diterima di Perguruan Tinggi yang telah terakreditasi baik di dalam maupun di luar
                        negeri.</li>
                    <li>Tidak berstatus sebagai dosen, guru vokasi, tenaga kependidikan, atau pelaku budaya.
                    </li>
                    <li>Komitmen untuk mempertahankan Indeks Prestasi Semester (IPS) minimal 3,00 (S1) atau
                        3,25 (S2 dan S3) selama menjadi penerima Beasiswa Unggulan.</li>
                </ul>
            </div>
        </article>
    </section>
    <section class="row gap-3 mt-5 justify-content-center mb-5">
        <article class="col-md-3 pl-5 text-center border border-secondary rounded-4 py-4">
            <div class="d-flex flex-column justify-content-between h-100">
                <h2>Beasiswa Non Akademik</h2>
                <p class="fw-light">Beasiswa non-akademik adalah bantuan keuangan yang diberikan kepada mahasiswa yang tidak
                    didasarkan pada prestasi akademik mereka. Prestasi non-akademik diperoleh dari kegiatan yang dilakukan
                    di
                    luar jam pelajaran.</p>
                <div>
                    <a href="{{ route('daftar.index') }}" class="btn btn-primary px-4 fw-medium">Daftar</a>
                </div>
            </div>
        </article>
        <article class="col-md-6 border border-secondary rounded-4 py-4">
            <h2 class="text-center">Syarat dan Ketentuan Penerima Beasiswa Non Akademik</h2>
            <p class="text-center fw-light">Beasiswa non-akademik adalah bantuan keuangan yang diberikan kepada mahasiswa
                yang tidak didasarkan pada prestasi akademik.</p>
            <div>
                <ul class="fw-light">
                    <li>Memiliki prestasi non-akademik minimal tingkat nasional.</li>
                    <li>Memiliki prestasi non-akademik di tingkat Kabupaten/Kota atau Provinsi.</li>
                    <li>Bukti prestasi di bidang kepemimpinan, olahraga, atau seni</li>
                    <li>Usia maksimal 20 tahun pada bulan Oktober tahun berjalan</li>
                    <li>Rekomendasi dari pengprov cabor atau dinas pendidikan provinsi</li>
                    <li>Bersedia mengikuti seleksi teknis yang diselenggarakan oleh kemahasiswaan</li>
                    <li>Warga Negara Indonesia.</li>
                    <li>Siswa/Siswi SMA/SMK/MA maksimal 1 tahun lulus terhitung tanggal surat keterangan lulus</li>
                    <li>Tidak sedang menerima beasiswa serupa dari sumber lain.</li>
                    <li>Belum pernah menempuh pendidikan pada jenjang yang sama.</li>
                </ul>
            </div>
        </article>
    </section>
@endsection
