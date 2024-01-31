@if (session('success'))
    <div class="alert alert-success alert-dismissible position-fixed fade show" role="alert" style="right: 3rem;">
        <strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible position-fixed fade show" role="alert" style="right: 3rem;">
        <strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
