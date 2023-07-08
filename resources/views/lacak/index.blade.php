@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Master Data Karyawan</h3>
            {{-- @include('partials.flash_messages') --}}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('search') }}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <label for="cari">Lacak No Tiket</label>
                                            <input type="text" class="form-control" name="cari" id="cari"
                                                placeholder="cari">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-magnifying-glass mr-1"></i>Lacak</button>
                                    </form>
                                </div>
                            </div>
                            {{-- <a href="{{ route('master.karyawan.create') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-solid fa-plus mr-1"></i>Tambah
                                </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
