@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang, {{ strtoupper(Auth::user()->name) }}</h3>
                        <h6 class="font-weight-normal mb-0">Semua sistem berjalan dengan normal!</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="images/dashboard/people.svg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-bold">Hostname Anda: {{ strtoupper(gethostname()) }}
                                    </h4>
                                    <h6 class="font-weight-strong mt-1 badge badge-danger">
                                        IP Address : {{ gethostbyname(gethostname()) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->id_role === 1)
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Tiket</p>
                                    <p class="fs-30 mb-2">{{ $masuk }} Tiket</p>
                                    <p><i>Jumlah ini selain tiket yng sudah selesai</i></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Tiket Selesai</p>
                                    <p class="fs-30 mb-2">{{ $selesai }} Tiket</p>
                                    <p><i>Jumlah keseluruhan tiket selesai</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Permintaan Tiket Masuk</p>
                                    <p class="fs-30 mb-2">{{ $open }} Tiket</p>
                                    <p>Jumlah tiket bersattus open</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Total Jumlah User</p>
                                    <p class="fs-30 mb-2">{{ $user }}m Karyawan</p>
                                    <p>Jumlah pengguna aktif selain Petugas IT</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
