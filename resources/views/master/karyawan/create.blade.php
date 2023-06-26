@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulir Tambah Data Karyawan</h4>
                <form class="forms-sample" method="POST" action="{{ route('master.karyawan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Nama Lengkap" value="{{ old('nama') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="mail@example.com" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="konfir_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfir_password" id="konfir_password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control" name="nik" id="nik"
                                    placeholder="000000000" value="{{ old('nik') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl" id="tgl"
                                    value="{{ old('tgl') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="kelamin" id="L"
                                                    value="L" checked>
                                                Laki-laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="kelamin" id="P"
                                                    value="P">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tlp">No. Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="000000000" name="tlp"
                                        value="{{ old('tlp') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
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
