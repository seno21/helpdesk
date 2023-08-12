@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <h2 class="mb-4 font-weight-bold">SISTEM INFORMASI HELPDESK TICKETING</h2>
        <hr>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        {{-- <h3 class="font-weight-bold">Selamat Datang, {{ strtoupper(Auth::user()->name) }}</h3> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                {{-- <div class="card tale-bg"> --}}
                <div class="card">
                    <div class="card-people mt-auto">
                        <img src="images/dashboard/helpdesk.jpg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"></h2>
                                </div>
                                <div>
                                    <h4 class="location font-weight-bold">Hostname: {{ strtoupper(gethostname()) }}
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
            @if (Auth::user()->id_role === 1 || Auth::user()->id_role === 2)
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card bg-primary text-light">
                                <div class="card-body">
                                    <p class="mb-4">Total Tiket Baru</p>
                                    <p class="fs-30 mb-2">{{ $baru }} Tiket</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Total Tiket Selesai</p>
                                    <p class="fs-30 mb-2">{{ $selesai }} Tiket</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card bg-success text-light">
                                <div class="card-body">
                                    <p class="mb-4">Tiket Dalam Proses</p>
                                    <p class="fs-30 mb-2">{{ $total }} Tiket</p>
                                    <p>Jumlah tiket dalam proses penanganan petugas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card bg-secondary text-light">
                                <div class="card-body">
                                    <p class="mb-4">Total Jumlah User</p>
                                    <p class="fs-30 mb-2">{{ $user }} User</p>
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
