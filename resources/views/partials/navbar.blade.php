<nav class="navbar navbar-expand-lg" style="background-color: #E0E0E0;">
    <div class="container-fluid">
        <a class="navbar-brand fw-medium" href="{{ route('pilih-beasiswa') }}">Beasiswa</a>
        <ul class="navbar-nav mx-auto gap-4">
            <li class="nav-item {{ Request::is('/') ? 'nav-pills' : 'bg-secondary rounded' }}"><a class="nav-link px-4 fw-medium {{ Request::is('/') ? 'active' : '' }}" href="{{ route('pilih-beasiswa') }}">Pilih Beasiswa</a></li>
            <li class="nav-item {{ Request::is('daftar') ? 'nav-pills' : 'bg-secondary rounded' }}"><a class="nav-link px-4 fw-medium {{ Request::is('daftar') ? 'active' : '' }}" href="{{ route('daftar.index') }}">Daftar</a></li>
            <li class="nav-item {{ Request::is('hasil') ? 'nav-pills' : 'bg-secondary rounded' }}"><a class="nav-link px-4 fw-medium {{ Request::is('hasil') ? 'active' : '' }}" href="{{ route('hasil') }}">Hasil</a></li>
        </ul>
    </div>
</nav>
