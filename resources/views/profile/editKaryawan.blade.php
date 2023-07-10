@extends('layouts.main')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="card-title">{{ strtoupper('Update Profil Karyawan') }}</h3>
            <p>
                <b>Nb.</b> Inputan yang bertanda (*) wajib diisi!
            </p>
            <div class="mt-4 mb-2">
                <h4>Profil Karyawan</h4>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('user.updateKaryawan', $karyawan->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap *</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Nama Lengkap" value="{{ $karyawan->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">Nomor Induk Karyawan *</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="000000000"
                                value="{{ $karyawan->nik }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl" id="tgl"
                                value="{{ $karyawan->tgl_lahir }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="d-flex">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kelamin" id="L"
                                                value="L" {{ $karyawan->kelamin == 'L' ? 'checked' : '' }}>
                                            Laki-laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kelamin" id="P"
                                                value="P" {{ $karyawan->kelamin == 'P' ? 'checked' : '' }}>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tlp">No. Telepon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                @php
                                    $tlp = $karyawan->telepon;
                                    $tlp = explode('-', $tlp);
                                    
                                @endphp
                                <input type="text" class="form-control" placeholder="000000000" name="tlp"
                                    value="{{ $tlp[1] }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4">{{ $karyawan->alamat }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="{{ route('dashboard') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection
