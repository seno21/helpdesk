@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h2 class="font-weight-bold">DETAIL PERMINTAAN </h2>
            <div class="col-lg-12 grid-margin stretch-card mt-5">
                <div class="card">
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Nomor Tiket: <b
                                    class="rounded px-1 badge-dark text-light font-weight-bold text-lg">{{ $detail->no_tiket }}</b>
                            </h3>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <ul class="mt-4 text-xl" style="list-style-type: none;">
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Tanggal dan Jam Komplain </h6>
                                    <h4 class="text-lg font-weight-strong mt-1">
                                        @php
                                            $tgl = date_create($detail->tanggal);
                                            echo date_format($tgl, 'd/m/Y H:i:s A');
                                        @endphp
                                    </h4>
                                </li>
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Pemohon: </h6>
                                    <h4 class="text-lg font-weight-strong mt-1">{{ $detail->pemohon }} </h4>
                                </li>
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Unit Kerja:</h6>
                                    <h4 class="text-lg font-weight-strong mt-1"> {{ $detail->divisi }}</h4>
                                </li>
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Lokasi Unit Kerja:</h6>
                                    <h4 class="text-lg font-weight-strong mt-1"> {{ $detail->lokasi }}</h4>
                                </li>
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Judul Komplain:</h6>
                                    <h4 class="text-lg font-weight-strong mt-1"> {{ $detail->judul }}</h4>
                                </li>
                                <li class="mb-4">
                                    <h6 class="font-weight-bold text-secondary">Keterangan Komplain Kerusakan:</h6>
                                    <h4 class="text-lg font-weight-strong mt-1"> {{ $detail->kerusakan }}</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless table-responsive">
                                <tr>
                                    <th class="bg-secondary">Status Tiket</th>
                                    <th>:</th>
                                    <th>
                                        <label class="badge font-weight-bold text-light"
                                            style="background: {{ $detail->warna }};">
                                            {{ $detail->status }}
                                        </label>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Prioritas</th>
                                    <th>:</th>
                                    <th>
                                        {{-- {{ $detail->prioritas }} --}}
                                        @if ($detail->prioritas === 'Hight')
                                            <label class="badge badge-danger font-weigh-bold">
                                                {{ $detail->prioritas }}
                                            </label>
                                        @elseif ($detail->prioritas == 'Medium')
                                            <label class="badge badge-warning font-weigh-bold">
                                                {{ $detail->prioritas }}
                                            </label>
                                        @elseif ($detail->prioritas == 'Low')
                                            <label class="badge badge-success font-weigh-bold">
                                                {{ $detail->prioritas }}
                                            </label>
                                        @else
                                            <label>-</label>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Petugas</th>
                                    <th>:</th>
                                    <th>
                                        {{ $petugas->nama }}
                                    </th>
                                </tr>
                                {{-- <tr>
                                    <th class="bg-secondary">Keterangan Kerusakan</th>
                                    <th>:</th>
                                    <th>
                                        <p>{{ $detail->kerusakan }}</p>
                                    </th>
                                </tr> --}}
                                <tr>
                                    <th class="bg-secondary">Tanggal selesai</th>
                                    <th>:</th>
                                    <th>
                                        {{-- @if ($petugas != null)
                                            @php
                                                $tgl = date_create($petugas->tgl_proses);
                                                echo date_format($tgl, 'd/m/Y H:i:s A');
                                            @endphp
                                        @else
                                            -
                                        @endif --}}

                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-2">
                            <a href="{{ route('tiket.baru') }}" class="btn btn-light"><i
                                    class="fa-solid fa-arrow-left"></i>
                                Tiket Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
