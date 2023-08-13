@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">History Tiket</h4>
            <form class="forms-sample" method="GET" action="{{ route('laporan') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal" id="tgl_awal"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="mb-3 btn btn-primary mr-2 btn-toolbar">
                    <i class="fa-solid fa-filter mr-1"></i>Filter
                </button>
            </form>

            <table class="table table-striped table-hover mt-5" id="DataTables">
                <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Unit</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                        <th class="text-center">Pemohon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td>{{ $laporan->no_tiket }}</td>
                            <td>
                                @php
                                    $tgl = date_create($laporan->tanggal);
                                    echo date_format($tgl, 'd/m/Y');
                                @endphp
                            </td>
                            <td>{{ $laporan->judul }}</td>
                            <td>{{ $laporan->divisi }}</td>
                            <td class="text-center">
                                @if ($laporan->prioritas === 'Hight')
                                    <label class="badge badge-danger font-weigh-bold">
                                        {{ $laporan->prioritas }}
                                    </label>
                                @elseif ($laporan->prioritas == 'Medium')
                                    <label class="badge badge-warning font-weigh-bold">
                                        {{ $laporan->prioritas }}
                                    </label>
                                @elseif ($laporan->prioritas == 'Low')
                                    <label class="badge badge-success font-weigh-bold">
                                        {{ $laporan->prioritas }}
                                    </label>
                                @else
                                    <label> - </label>
                                @endif
                            </td>
                            <td>
                                <label class="badge font-weight-bold text-light" style="background: {{ $laporan->warna }};">
                                    {{ $laporan->status }}
                                </label>
                            </td>
                            <td>{{ $laporan->pemohon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection()
