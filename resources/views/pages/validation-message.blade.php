@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <!-- <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
@endif