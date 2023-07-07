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
                            <table class="table table-borderless table-responsive">
                                <tbody>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <th>
                                            <label class="badge font-weight-bold text-light"
                                                style="background: {{ $detail->warna }};">
                                                {{ $detail->status }}
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Pemohon</th>
                                        <th>:</th>
                                        <th>{{ $detail->pemohon }}</th>
                                    </tr>
                                    <tr>
                                        <th>Petugas</th>
                                        <th>:</th>
                                        <th>{{ $petugas != null ? $petugas->nama : '-' }}</th>
                                    </tr>
                                    <tr>
                                        <th>Prioritas</th>
                                        <th>:</th>
                                        <th>
                                            @if ($detail->color == '1')
                                                <label class="badge badge-danger font-weigh-bold">
                                                    {{ $detail->tipe }}
                                                </label>
                                            @elseif ($detail->color == '2')
                                                <label class="badge badge-warning font-weigh-bold">
                                                    {{ $detail->tipe }}
                                                </label>
                                            @else
                                                <label class="badge badge-success font-weigh-bold">
                                                    {{ $detail->tipe }}
                                                </label>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Judul</th>
                                        <th>:</th>
                                        <th>{{ $detail->judul }}</th>
                                    </tr>
                                    <tr>
                                        <th>Unit Kerja</th>
                                        <th>:</th>
                                        <th>{{ $detail->divisi }}</th>
                                    </tr>
                                    <tr>
                                        <th>Lokasi Detail</th>
                                        <th>:</th>
                                        <th>
                                            <p>{{ $detail->lokasi }}</p>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7 pr-5">
                            <div class="stepper d-flex flex-column pr-4 ml-2 mr-5">
                                <div class="d-flex mb-1">
                                    <div class="d-flex flex-column pr-4 align-items-center">
                                        <div class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-success text-white mb-1">
                                            <i class="fa-solid fa-flag-checkered"></i>
                                        </div>
                                        <div class="line h-100"></div>
                                    </div>
                                    <div>
                                        <h4 class="mt-1">Pemohon: <b><u><i>{{ $detail->pemohon }}</i></u></b></h4>
                                        <h5>
                                            @php
                                                $tgl = date_create($detail->tanggal);
                                                echo date_format($tgl, 'd/m/Y H:i:s A');
                                            @endphp
                                        </h5>
                                        <h5 class="mt-4">Deskripsi.</h5>
                                        <p class="pb-3">
                                            {{ $detail->kerusakan }}
                                        </p>
                                    </div>
                                </div>
                                @foreach ($progreses as $progres)
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            @if ($progres->last != null)
                                                <div class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-danger text-white mb-1">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </div>
                                                <div class="line h-100 d-none"></div>
                                            @else
                                                <div class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-primary text-white mb-1">
                                                    <i class="fa-solid fa-check"></i>
                                                </div>
                                                <div class="line h-100"></div>
                                            @endif
                                        </div>

                                        <div>
                                            <h4 class="mt-2">Petugas:
                                                <b><u><i>{{ $progres->nama }}</i></u></b>
                                            </h4>
                                            <h5>
                                                @php
                                                    $tgl_proses = date_create($progres->tgl_proses);
                                                    echo date_format($tgl_proses, 'd/m/y H:i:s A');
                                                @endphp
                                            </h5>
                                            <h5 class="mt-4">Deskripsi.</h5>
                                            {!! $progres->deskripsi !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('tiket.order.index') }}" class="btn btn-light"><i
                                class="fa-solid fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
