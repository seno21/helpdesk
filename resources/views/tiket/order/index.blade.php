@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Daftar Order Masuk</h3>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                {{-- <a href="{{ route('tiket.new.create') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-solid fa-ticket mr-1"></i>New Ticket
                                </a> --}}
                            </div>
                            <table class="table table-striped table-hover" id="DataTables">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Tanggal Komplain</th>
                                        <th>Judul</th>
                                        <th>Unit</th>
                                        <th>Prioritas</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tikets as $tiket)
                                        <tr class="{{ $tiket->selesai === 1 ? 'bg-secondary' : '' }}">
                                            <td>{{ $tiket->no_tiket }}</td>
                                            <td>
                                                @php
                                                    $tgl = date_create($tiket->created_at);
                                                    echo date_format($tgl, 'd/m/Y');
                                                @endphp
                                            </td>
                                            <td>{{ $tiket->judul }}</td>
                                            <td>{{ $tiket->divisi }}</td>
                                            <td>
                                                @if ($tiket->prioritas === 'Hight')
                                                    <label class="badge badge-danger font-weigh-bold">
                                                        {{ $tiket->prioritas }}
                                                    </label>
                                                @elseif ($tiket->prioritas == 'Medium')
                                                    <label class="badge badge-warning font-weigh-bold">
                                                        {{ $tiket->prioritas }}
                                                    </label>
                                                @elseif ($tiket->prioritas == 'Low')
                                                    <label class="badge badge-success font-weigh-bold">
                                                        {{ $tiket->prioritas }}
                                                    </label>
                                                @endif
                                            </td>
                                            <td>
                                                <label class="badge font-weight-bold text-light"
                                                    style="background: {{ $tiket->warna }};">
                                                    {{ $tiket->status }}
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('tiket.order.show', $tiket->idTiket) }}"
                                                    class="ml-2 btn btn-sm btn-info">
                                                    <i class="fa-solid fa-circle-info mr-1"></i>
                                                </a>
                                                <a href="{{ route('tiket.order.edit', $tiket->idTiket) }}"
                                                    class="ml-2 btn btn-sm btn-success">
                                                    <i class="fa-solid fa-reply mr-1"></i>
                                                </a>
                                                <a href="{{ route('tiket.order.finish', $tiket->idTiket) }}"
                                                    class="ml-2 btn btn-sm btn-success">
                                                    <i class="fa-solid fa-check mr-1"></i>
                                                </a>
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
