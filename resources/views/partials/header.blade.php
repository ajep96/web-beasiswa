<header class="container" style="height: 30vh;">
    <div class="row h-100">
        <div class="col-md-12 align-self-center text-center">
            <h2>{{ $headerTitle }}</h2>
            @if (Request::is('/'))
                <p class="fs-5">Informasi jalur beasiswa yang sedang dibuka pada periode 2024</p>
            @endif
        </div>
    </div>
</header>
