@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulir Edit Data Status</h4>
                <form class="forms-sample" method="POST" action="{{ route('master.status.update', $status->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" name="status" id="status"
                                    placeholder="status" value="{{ $status->status }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="ket" id="ket" rows="4">{{ $status->keterangan }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ route('master.status.index') }}" class="btn btn-light"><i
                            class="fa-solid fa-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
