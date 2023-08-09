@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Pembuatan Tiket Baru</h4>
            @php
                $tgl = date('ymis');
                // $datetime = date('dmyhi');
            @endphp
            <form class="forms-sample" method="POST" action="{{ route('tiket.new.store') }}">
                @csrf
                <input type="hidden" name="tgl_buat" value="{{ date('Y-m-d') }}">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="no_tiket">No. Tiket</label>
                            <input type="text" class="form-control" name="no_tiket" id="no_tiket"
                                value="{{ 'IT' . $tgl }}" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul Komplain</label>
                            <input type="text" class="form-control" name="judul" id="judul"
                                value="{{ old('judul') }}">
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
                            <label for="kerusakan">Jelaskan Keterangan Komplain</label>
                            <textarea class="form-control" name="kerusakan" id="kerusakan" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lokasi">Detail Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi"
                                value="{{ old('lokasi') }}">
                        </div>
                    </div>
                </div> --}}

                <button type="submit" class="btn btn-primary mr-2">Buat Tiket</button>
                <a href="{{ route('tiket.baru') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection()
