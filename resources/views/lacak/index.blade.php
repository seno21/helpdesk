@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Lacak Detail Penangann Tiket</h3>
            {{-- @include('partials.flash_messages') --}}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('search.tiket') }}" method="GET">
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
                            <div class="row mt-5">
                                <div class="col-md-12 ml-5">
                                    <div class="stepper d-flex flex-column pr-4 ml-2 mr-5 mb-4">
                                        @if ($hasil != null)
                                            <div class="d-flex mb-1">
                                                <div class="d-flex flex-column pr-4 align-items-center">
                                                    <div
                                                        class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-success text-white mb-1">
                                                        <i class="fa-solid fa-flag-checkered"></i>
                                                    </div>
                                                    <div class="line h-100"></div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-1"><b>Pemohon: </b>{{ $hasil->pemohon }}</h4>
                                                    <h4 class="mt-1"><b>Petugas: </b>{{ $petugas }}</h4>
                                                    <h5>
                                                        @php
                                                            $tgl = date_create($hasil->tanggal);
                                                            echo date_format($tgl, 'd/m/Y H:i:s A');
                                                        @endphp
                                                    </h5>
                                                    <h5 class="mt-4">Deskripsi.</h5>
                                                    <p class="pb-3">
                                                        {{ $hasil->kerusakan }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($progreses as $progres)
                                            <div class="d-flex mb-1">
                                                <div class="d-flex flex-column pr-4 align-items-center">
                                                    @if ($progres->last != null)
                                                        <div
                                                            class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-danger text-white mb-1">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                        </div>
                                                        <div class="line h-100 d-none"></div>
                                                    @else
                                                        <div
                                                            class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-primary text-white mb-1">
                                                            <i class="fa-solid fa-check"></i>
                                                        </div>
                                                        <div class="line h-100"></div>
                                                    @endif
                                                </div>

                                                <div>
                                                    <h5 class="mt-3">
                                                        @php
                                                            $tgl_proses = date_create($progres->tgl_proses);
                                                            echo date_format($tgl_proses, 'd/m/y H:i:s A');
                                                        @endphp
                                                    </h5>
                                                    <h5 class="mt-4">Deskripsi.</h5>
                                                    {!! $progres->deskripsi !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <a href="{{ route('dashboard') }}" class="btn btn-light">
                                    <i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
