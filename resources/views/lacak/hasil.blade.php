@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Detail Proses Penanganan Tiket</h3>
            {{-- @include('partials.flash_messages') --}}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-12 ml-5">
                                    <div class="stepper d-flex flex-column pr-4 ml-2 mr-5">
                                        <div class="d-flex mb-1">
                                            <div class="d-flex flex-column pr-4 align-items-center">
                                                <div class="rounded-circle pb-2 pl-3 pr-3 pt-3 bg-success text-white mb-1">
                                                    <i class="fa-solid fa-flag-checkered"></i>
                                                </div>
                                                <div class="line h-100"></div>
                                            </div>
                                            <div>
                                                <h4 class="mt-1">Pemohon: <b><u><i>{{ $hasil->pemohon }}</i></u></b></h4>
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
                                                    <h4 class="mt-2">Petugas:
                                                        <b><u><i>{{ $progres->nama }}</i></u></b>
                                                    </h4>
                                                    <h5>
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
                            </div>

                            <a href="{{ route('lacak.index') }}" class="btn btn-light">
                                <i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
