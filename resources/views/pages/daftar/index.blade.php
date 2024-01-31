@extends('template')
@section('title', 'Daftar')
@section('content')
    @include('partials.session')
    <section class="container">
        <form action="{{ route('daftar.store') }}" method="post" class="border border-secondary rounded-4 mb-5"
            enctype="multipart/form-data">
            @csrf
            <div style="background-color: #E0E0E0; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h4 class="fw-normal p-3">Formulir Registrasi Mahasiswa</h4>
            </div>
            <article class="p-5">
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control shadow-sm @error('nim') is-invalid @enderror text-capitalize" id="nim"
                            name="nim" value="{{ old('nim') }}" placeholder="input">
                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Masukkan Nama</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control shadow-sm @error('nama') is-invalid @enderror text-capitalize"
                            id="nama" name="nama" value="{{ old('nama') }}" placeholder="input">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control shadow-sm @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="input">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="noHp" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control shadow-sm @error('noHp') is-invalid @enderror"
                            id="noHp" name="noHp" value="{{ old('noHp') }}" placeholder="input">
                        @error('noHp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row justify-content-between">
                    <label for="semester" class="col-sm-2 col-form-label">Semester Saat Ini</label>
                    <div class="col">
                        <select class="form-select shadow-sm @error('semester') is-invalid @enderror" aria-label="semester"
                            name="semester" id="semester">
                            <option hidden>input</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                        @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="ipk" class="col-sm-2 col-form-label">IPK Terakhir</label>
                    <div class="col">
                        <input type="number" class="form-control shadow-sm @error('ipk') is-invalid @enderror"
                            id="ipk" name="ipk" value="{{ old('ipk') }}" placeholder="input" step="0.01">
                        @error('ipk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="beasiswa" class="col-sm-2 col-form-label">Pilih Beasiswa</label>
                    <div class="col-sm-10">
                        <select class="form-select shadow-sm @error('beasiswa') is-invalid @enderror" aria-label="beasiswa"
                            name="beasiswa" id="beasiswa" disabled>
                            <option hidden>input</option>
                            <option value="akademik">Beasiswa Akademik</option>
                            <option value="non akademik">Beasiswa non-akademik</option>
                        </select>
                        @error('beasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="berkas" class="col-sm-2 col-form-label">Upload Berkas Syarat</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control shadow-sm @error('berkas') is-invalid @enderror"
                            id="berkas" name="berkas" value="{{ old('berkas') }}" placeholder="input Upload file"
                            disabled>
                        <small>*Berkas harus format pdf.</small>
                        @error('berkas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-5">
                    <button type="submit" class="btn btn-primary px-5" id="submit" disabled>Daftar</button>
                    <a href="" class="btn border border-secondary px-5">Batal</a>
                </div>
            </article>
        </form>
    </section>
    @push('scripts')
        <script>
            document.getElementById('nim').addEventListener('blur', function() {
                var nim = this.value;

                fetch('api/get-mahasiswa/' + nim)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('nama').value = data.nama;
                            document.getElementById('email').value = data.email;
                            document.getElementById('noHp').value = data.no_hp;
                            document.getElementById('ipk').value = data.ipk;

                            // Periksa IPK
                            if (parseFloat(data.ipk) < 3) {
                                // Nonaktifkan atau sembunyikan elemen formulir
                                document.getElementById('beasiswa').disabled = true;
                                document.getElementById('berkas').disabled = true;
                                document.getElementById('submit').disabled = true;
                            } else {
                                // Aktifkan elemen formulir
                                document.getElementById('beasiswa').disabled = false;
                                document.getElementById('berkas').disabled = false;
                                document.getElementById('submit').disabled = false;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        </script>
    @endpush
@endsection
