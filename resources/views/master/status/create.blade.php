@extends('layouts.main')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Tambah Data Status</h4>
            <form class="forms-sample" method="POST" action="{{ route('master.status.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="warna">Warna Label</label>
                            <input type="color" class="form-control" name="warna" id="warna" placeholder="warna"
                                value="{{ old('warna') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" id="status" placeholder="status"
                                value="{{ old('status') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" name="ket" id="ket" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('master.status.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection
