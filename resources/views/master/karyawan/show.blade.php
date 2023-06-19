@extends('layout.main')

@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Informasi Karyawan</h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>:</th>
                                    <th>{{ $show->nama }}</th>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Karyawan</th>
                                    <th>:</th>
                                    <th>{{ $show->nik }}</th>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th>:</th>
                                    <th>{{ $show->tgl_lahir }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>:</th>
                                    <th>{{ $show->kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</th>
                                </tr>
                                <tr>
                                    <th>No. Telepon</th>
                                    <th>:</th>
                                    <th>
                                        @php
                                            $tlp = $show->telepon;
                                            $tlp = explode('-', $tlp);
                                            echo '0' . $tlp[1];
                                        @endphp
                                    </th>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <th>:</th>
                                    <th>{{ $show->alamat }}</th>
                                </tr>
                            </tbody>
                        </table>
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
    </div>
@endsection
