@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Komplain Selesai</h4>
            <form class="forms-sample" method="POST" action="{{ route('tiket.order.end', $tiket->id) }}">
                @csrf
                @method('PUT')
                {{-- <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_proses">Tanggal</label>
                            <input type="datetime-local" class="form-control" name="tgl_proses" id="tgl_proses">
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_proses">Tanggal</label>
                            <input type="text" class="form-control" name="tgl_proses" id="tgl_proses"
                                value="{{ date('Y-m-d H:i:s') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <div>
                                <select class="form-control" name="petugas" id="petugas">
                                    @foreach ($karyawans as $karyawan)
                                        <option value="{{ $karyawan->id }}">
                                            {{ $karyawan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div>
                                <select class="form-control" name="status" id="status">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">
                                            {{ $status->status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                {{-- Input selesai dan last --}}
                <input type="hidden" name="selesai" value="1">
                <input type="hidden" name="last" value="1">

                <button type="submit" class="btn btn-danger mr-2">Tandai Selesai</button>
                <a href="{{ route('tiket.order.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection()
