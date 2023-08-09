@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Pembuatan Tiket Baru</h4>
            <form class="forms-sample" method="POST" action="{{ route('tiket.new.update', $tiket->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="tgl_buat" value="{{ date('Y-m-d') }}">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="no_tiket">No. Tiket</label>
                            <input type="text" class="form-control" name="no_tiket" id="no_tiket"
                                value="{{ $tiket->no_tiket }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul Komplain</label>
                            <input type="text" class="form-control" name="judul" id="judul"
                                value="{{ $tiket->judul }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit">Unit Kerja</label>
                            <div>
                                <select class="form-control" name="unit" id="unit">
                                    <option value="{{ $unit->id }}">{{ $unit->divisi }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kerusakan">Deskripsi Kerusakan</label>
                            <textarea class="form-control" name="kerusakan" id="kerusakan" rows="8">{{ $tiket->kerusakan }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Edit Tiket</button>
                <a href="{{ route('tiket.baru') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection()
