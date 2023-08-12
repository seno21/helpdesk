@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Daftar Tiket</h3>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                @if (Auth::user()->id_role === 3)
                                    <a href="{{ route('tiket.new.create') }}" class="btn btn-primary"><i
                                            class="fa-solid fa-solid fa-ticket mr-1"></i>New Ticket
                                    </a>
                                @endif
                            </div>
                            <table class="table table-striped table-hover" id="DataTables">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Judul</th>
                                        <th>Unit</th>
                                        {{-- <th>Petugas</th> --}}
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tikets as $tiket)
                                        <tr class="{{ $tiket->prioritas != null ? 'bg-secondary' : '' }}">
                                            <td>{{ $tiket->no_tiket }}</td>
                                            <td>
                                                @php
                                                    $tgl_buat = date_create($tiket->created_at);
                                                    $tgl_buat = date_format($tgl_buat, 'd/m/Y');
                                                @endphp
                                                {{ $tgl_buat }}
                                            </td>
                                            <td>{{ $tiket->judul }}</td>
                                            <td>{{ $tiket->divisi }}</td>
                                            {{-- <td>
                                                    @if ($tiket->prioritas == '1')
                                                        <label class="badge badge-danger font-weigh-bold">
                                                            {{ $tiket->tipe }}
                                                        </label>
                                                    @elseif ($tiket->prioritas == '2')
                                                        <label class="badge badge-warning font-weigh-bold">
                                                            {{ $tiket->tipe }}
                                                        </label>
                                                    @else
                                                        <label class="badge badge-success font-weigh-bold">
                                                            {{ $tiket->tipe }}
                                                        </label>
                                                    @endif
                                                </td> --}}

                                            <td>
                                                <label class="badge font-weight-bold text-light"
                                                    style="background: {{ $tiket->warna }};">
                                                    {{ $tiket->status }}
                                                </label>
                                            </td>
                                            {{-- <td>{!! $tiket->kerusakan !!}</td> --}}
                                            <td>
                                                <div class="d-flex">
                                                    @if (Auth::user()->id_role === 1 && $tiket->prioritas == null)
                                                        <a href="{{ route('tiket.tugas.edit', $tiket->id) }}"
                                                            class=" btn btn-sm btn-success">
                                                            <i class="fa-solid fa-reply mr-1"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('tiket.new.show', $tiket->id) }}"
                                                        class="ml-2 btn btn-sm btn-info">
                                                        <i class="fa-solid fa-circle-info mr-1"></i>
                                                    </a>

                                                    @if (Auth::user()->id_role != 1)
                                                        <a href="{{ route('tiket.new.edit', $tiket->id) }}"
                                                            class="ml-2 btn btn-sm btn-warning" disabled>
                                                            <i class="fa-solid fa-pen-to-square mr-1"></i>
                                                        </a>
                                                        <form class="ml-2"
                                                            action="{{ route('tiket.new.destroy', $tiket->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btnDelete">
                                                                <i class="fa-solid fa-trash mr-1"></i>
                                                            </button>
                                                        </form>
                                                    @endif
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
@endsection()
