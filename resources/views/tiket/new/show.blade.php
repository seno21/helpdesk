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
                            <h4 class="font-weight-bold mt-4 badge badge-danger">DETAIL KERUSAKAN</h4>
                            <div class="blockquote blockquote-reverse rounded">
                                <p>{{ $detail->kerusakan }}</p>
                                <footer class="blockquote-footer">{{ $detail->pemohon }}</footer>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="bg-secondary">Status</th>
                                        <th>:</th>
                                        <th>
                                            <label class="badge font-weight-bold text-light"
                                                style="background: {{ $detail->warna }};">
                                                {{ $detail->status }}
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary">Pemohon</th>
                                        <th>:</th>
                                        <th>{{ $detail->pemohon }}</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary">Petugas</th>
                                        <th>:</th>
                                        <th>{{ $petugas != null ? $petugas->nama : '-' }}</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary">Prioritas</th>
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
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless table-responsive">
                                <tr>
                                    <th class="bg-secondary">Tanggal Komplain</th>
                                    <th>:</th>
                                    <th>
                                        @php
                                            $tgl = date_create($detail->tanggal);
                                            echo date_format($tgl, 'd/m/Y H:i:s A');
                                        @endphp
                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Tanggal selesai</th>
                                    <th>:</th>
                                    <th>
                                        @if ($petugas != null)
                                            @php
                                                $tgl = date_create($petugas->tgl_proses);
                                                echo date_format($tgl, 'd/m/Y H:i:s A');
                                            @endphp
                                        @else
                                            -
                                        @endif

                                    </th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Judul</th>
                                    <th>:</th>
                                    <th>{{ $detail->judul }}</th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Unit Kerja</th>
                                    <th>:</th>
                                    <th>{{ $detail->divisi }}</th>
                                </tr>
                                <tr>
                                    <th class="bg-secondary">Lokasi Detail</th>
                                    <th>:</th>
                                    <th>
                                        <p>{{ $detail->lokasi }}</p>
                                    </th>
                                </tr>
                                {{-- <tr>
                                    <th class="bg-secondary">Keterangan Kerusakan</th>
                                    <th>:</th>
                                    <th>
                                        <p>{{ $detail->kerusakan }}</p>
                                    </th>
                                </tr> --}}
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-2">
                            <a href="{{ route('tiket.new.index') }}" class="btn btn-light"><i
                                    class="fa-solid fa-arrow-left"></i>
                                Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
