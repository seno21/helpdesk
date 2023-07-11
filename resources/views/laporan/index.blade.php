@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">LAPORAN</h4>
            <form class="forms-sample" method="POST" action="{{ route('laporan') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div>
                                <select class="form-control" name="status" id="status">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit">Status</label>
                            <div>
                                <select class="form-control" name="unit" id="unit">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="mb-3 btn btn-primary mr-2 btn-toolbar">
                    <i class="fa-solid fa-filter mr-1"></i>Filter
                </button>
            </form>

            <table class="table table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Tanggal Dibuat</th>
                        <th>Judul</th>
                        <th>Unit</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection()
