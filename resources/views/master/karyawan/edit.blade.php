@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulir Tambah Data Karyawan</h4>
                <form class="forms-sample" method="POST" action="{{ route('master.karyawan.update', $karyawan->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Nama Lengkap" value="{{ $karyawan->nama }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control" name="nik" id="nik"
                                    placeholder="000000000" value="{{ $karyawan->nik }}">
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="000000000" name="tlp"
                                        value="@php $tlp = $karyawan->telepon; 
                                        $tlp = explode('-', $tlp); echo $tlp[1]; @endphp">
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

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ route('master.karyawan.index') }}" class="btn btn-light"><i
                            class="fa-solid fa-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
