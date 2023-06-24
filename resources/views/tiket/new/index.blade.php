@extends('layouts.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Master Data Karyawan</h3>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3">
                                    <a href="{{ route('tiket.new.create') }}" class="btn btn-primary"><i
                                            class="fa-solid fa-solid fa-ticket mr-1"></i>New Ticket
                                    </a>
                                </div>
                                <table class="table table-striped" id="DataTables">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            {{-- <th class="text-center"><i class="fa-solid fa-venus-mars"></i></th> --}}
                                            <th>No. Telepon</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>cell</td>
                                            <td>cell</td>
                                            <td>cell</td>
                                            <td>cell</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
