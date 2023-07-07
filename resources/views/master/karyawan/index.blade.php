@extends('layouts.main')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Master Data Karyawan</h3>
            {{-- @include('partials.flash_messages') --}}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <a href="{{ route('master.karyawan.create') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-solid fa-plus mr-1"></i>Tambah
                                </a>
                            </div>
                            <table class="table table-striped table-hover" id="DataTables">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        {{-- <th class="text-center"><i class="fa-solid fa-venus-mars"></i></th> --}}
                                        <th>No. Telepon</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawans as $karyawan)
                                        <tr>
                                            <td>{{ $karyawan->nama }}</td>
                                            {{-- <td>
                                                    @php
                                                        $tgl = date_create($karyawan->tgl_lahir);
                                                        echo date_format($tgl, 'd/m/Y');
                                                    @endphp
                                                </td> --}}
                                            {{-- <td>{{ $karyawan->kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td> --}}
                                            <td>{{ $karyawan->nik }}</td>
                                            <td>
                                                @php
                                                    $tlp = $karyawan->telepon;
                                                    $tlp = explode('-', $tlp);
                                                    echo '0' . $tlp[1];
                                                @endphp
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('master.karyawan.show', $karyawan->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa-solid fa-circle-info mr-1"></i>
                                                    </a>
                                                    <a href="{{ route('master.karyawan.edit', $karyawan->id) }}"
                                                        class="ml-2 btn btn-sm btn-warning">
                                                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                                                    </a>
                                                    <form class="ml-2"
                                                        action="{{ route('master.karyawan.destroy', $karyawan->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" id="btnDelete">
                                                            <i class="fa-solid fa-trash mr-1"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#karyawan').DataTable();
        })
    </script>
@endsection
