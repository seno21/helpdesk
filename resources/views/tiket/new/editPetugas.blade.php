@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Penaganan Komplain</h4>
            @php
                $tgl = date('ymis');
                // $datetime = date('dmyhi');
            @endphp
            <form class="forms-sample" method="POST" action="{{ route('tiket.tugas.update', $tiket->id) }}">
                @csrf
                @method('PUT')
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
                            <label for="prioritas">Prioritas</label>
                            <div>
                                <select class="form-control" name="prioritas" id="prioritas">
                                    <option value="Hight">Hight</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mr-2">Kirim</button>
                <a href="{{ route('tiket.baru') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection()
