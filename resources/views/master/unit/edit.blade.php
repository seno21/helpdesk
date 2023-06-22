@extends('layout.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulir Edit Data Unit</h4>
                <form class="forms-sample" method="POST" action="{{ route('master.unit.update', $unit->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <input type="text" class="form-control" name="divisi" id="divisi"
                                    placeholder="nama divisi" value="{{ $unit->divisi }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <div>
                                    <select class="form-control" name="kategori" id="kategori">
                                        <option value="Medis" {{ $unit->kategori == 'Medis' ? 'selected' : '' }}>Medis
                                        </option>
                                        <option value="Penunjang Medis"
                                            {{ $unit->kategori == 'Penunjang Medis' ? 'selected' : '' }}>Penunjang Medis
                                        </option>
                                        <option value="Non Medis" {{ $unit->kategori == 'Non Medis' ? 'selected' : '' }}>Non
                                            Medis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prioritas">Prioritas</label>
                                <div>
                                    <select class="form-control" name="prioritas" id="prioritas">
                                        <option value="1" {{ $unit->kode == '1' ? 'selected' : '' }}>Hight</option>
                                        <option value="2" {{ $unit->kode == '2' ? 'selected' : '' }}>Medium</option>
                                        <option value="3" {{ $unit->kode == '3' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ route('master.unit.index') }}" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection()
