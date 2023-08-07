@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Formulir Tambah Data Unit</h4>
            <form class="forms-sample" method="POST" action="{{ route('master.unit.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="divisi">Divisi</label>
                            <input type="text" class="form-control" name="divisi" id="divisi"
                                placeholder="nama divisi" value="{{ old('divisi') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
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
                {{-- Ini untuk bagian prioritas --}}
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prioritas">Prioritas</label>
                            <div>
                                <select class="form-control" name="prioritas" id="prioritas">
                                    <option value="1">Hight</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('master.unit.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                    Back</a>
            </form>
        </div>
    </div>
@endsection()
