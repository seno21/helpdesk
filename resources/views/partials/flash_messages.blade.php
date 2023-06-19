@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h5 class="alert-heading">Terjadi Kesalahan!</h5>
        <hr>
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{ $item }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('success'))
    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ Session::get('success') }}",
            showConfirmButton: false,
            timer: 1000
        })
    </script>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
