@extends('layouts.main')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">PROFILE KARYAWAN</h4>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('images/faces/user.png') }}" width="auto" height="50%" alt="Profil">
                </div>
                <div class="col-md-4">
                    <ul class="mt-4 text-xl" style="list-style-type: none;">
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Nama Lengkap</h6>
                            <h4 class="text-lg font-weight-strong"> {{ strtoupper($show->nama) }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Nomor Induk Karyawan</h6>
                            <h4 class="text-lg font-weight-strong"> {{ strtoupper($show->nik) }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Tanggal Lahir</h6>
                            <h4 class="text-lg font-weight-strong"> {{ strtoupper($show->tgl_lahir) }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Jenis kelamin</h6>
                            <h4 class="text-lg">
                                {{ $show->kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Alamat Lengkap</h6>
                            <h4 class="text-lg font-weight-strong"> {{ $show->alamat }}</h4>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="mt-4 text-xl" style="list-style-type: none;">
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Usename</h6>
                            <h4 class="text-lg font-weight-strong"> {{ $show->name }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Email</h6>
                            <h4 class="text-lg font-weight-strong"> {{ $show->email }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">No. Telepeon</h6>
                            <h4 class="text-lg font-weight-strong">
                                @php
                                    $tlp = $show->telepon;
                                    $tlp = explode('-', $tlp);
                                    echo '0' . $tlp[1];
                                @endphp
                            </h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Unit Kerja</h6>
                            <h4 class="text-lg">
                                {{ $show->divisi }}</h4>
                        </li>
                        <li class="mb-4">
                            <h6 class="font-weight-bold text-secondary">Detail Lokasi Unit Kerja</h6>
                            <h4 class="text-lg font-weight-strong"> {{ $show->lokasi }}</h4>
                        </li>
                    </ul>

                    <div class="text-right" style="font-size: 12px;">
                        Data di update pada tanggal
                        @php
                            $tgl = date_create($show->created_at);
                            echo '<b>' . date_format($tgl, 'd/m/Y') . '</b>';
                        @endphp
                    </div>
                </div>
            </div>
            <a href="{{ route('master.karyawan.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                Back</a>
        </div>
    </div>
@endsection
