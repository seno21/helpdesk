@extends('layout.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Master Data Unit</h3>
                {{-- @include('partials.flash_messages') --}}
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3">
                                    <a href="{{ route('master.unit.create') }}" class="btn btn-primary"><i
                                            class="fa-solid fa-solid fa-plus mr-1"></i>Tambah
                                    </a>
                                </div>
                                <table class="table table-striped" id="karyawan">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Unit Kerja</th>
                                            <th>Kategori</th>
                                            <th>Prioritas</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($units as $unit)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $unit->divisi }}</td>
                                                <td>{{ $unit->kategori }}</td>
                                                <td>
                                                    @if ($unit->kode == '1')
                                                        <label class="badge badge-danger font-weigh-bold">
                                                            {{ $unit->tipe }}
                                                        </label>
                                                    @elseif ($unit->kode == '2')
                                                        <label class="badge badge-warning font-weigh-bold">
                                                            {{ $unit->tipe }}
                                                        </label>
                                                    @else
                                                        <label class="badge badge-success font-weigh-bold">
                                                            {{ $unit->tipe }}
                                                        </label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('master.unit.edit', $unit->id) }}"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                                        </a>
                                                        <form class="ml-1"
                                                            action="{{ route('master.unit.destroy', $unit->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btnDelete">
                                                                <i class="fa-solid fa-trash"></i>
                                                                Hapus
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
    </div>
@endsection()
