@extends('layouts.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulir Pembuatan Tiket Baru</h4>
                @php
                    $tgl = date('ymis');
                    // $datetime = date('dmyhi');
                @endphp
                <form class="forms-sample" method="POST" action="{{ route('master.unit.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_tiket">No. Tiket</label>
                                <input type="text" class="form-control" name="no_tiket" id="no_tiket"
                                    value="{{ 'IT' . $tgl }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_buat">Tanggal</label>
                                <input type="datetime-local" class="form-control" name="tgl_buat" id="tgl_buat"
                                    value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Tanggal</label>
                                <div>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="Medis">Medis</option>
                                        <option value="Penunjang Medis">Penunjang Medis</option>
                                        <option value="Non Medis">Non Medis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Buat Tiket</button>
                    <a href="{{ route('tiket.new.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection()
