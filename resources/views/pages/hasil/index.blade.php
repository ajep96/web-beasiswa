@extends('template')
@section('title', 'Hasil')
@section('content')
@include('partials.session')
    <section>
        <div style="width: 30%; margin: auto;" class="mb-5">
            <canvas id="myChart"></canvas>
        </div>
        <div class="container-fluid">
            <div class="border border-secondary rounded-4">
                <div style="background-color: #E0E0E0; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <h4 class="fw-normal p-3">List Peserta Beasiswa</h4>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>email</th>
                            <th>No. HP</th>
                            <th>Semester</th>
                            <th>IPK</th>
                            <th>Jenis Beasiswa</th>
                            <th>Berkas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataBeasiswa as $beasiswa)
                            <tr>
                                <td>{{ $beasiswa->mahasiswa->nama }}</td>
                                <td>{{ $beasiswa->mahasiswa->email }}</td>
                                <td>{{ $beasiswa->mahasiswa->no_hp }}</td>
                                <td>{{ $beasiswa->semester }}</td>
                                <td>{{ $beasiswa->mahasiswa->ipk }}</td>
                                <td>{{ $beasiswa->daftarBeasiswa->nama_beasiswa }}</td>
                                <td>
                                    <a href="{{ asset('berkas/'.$beasiswa->berkas) }}" class="btn btn-primary">Lihat</a>
                                </td>
                                <td>
                                    @if ($beasiswa->status == 0)
                                        <span class="badge bg-warning text-dark">belum di verifikasi</span>
                                    @elseif ($beasiswa->status == 1)
                                        <span class="badge bg-success">Diterima</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    @push('scripts')
    <script src="{{ asset('assets/vendor/bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            // Data untuk chart
            var data = {
                labels: ["Akademik", "Non Akademik"],
                datasets: [{
                    data: [{{ $dataBeasiswa->where('daftar_beasiswa_id', 1)->count() }},
                        {{ $dataBeasiswa->where('daftar_beasiswa_id', 2)->count() }}
                    ],
                    backgroundColor: ["#56CCF2", "#F2994A"]
                }]
            };

            // Konfigurasi chart
            var options = {
                plugins: {
                    legend: {
                        position: 'bottom' // Set posisi label ke bawah
                    }
                }
            };

            // Inisialisasi chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options
            });
        </script>
    @endpush
@endsection
