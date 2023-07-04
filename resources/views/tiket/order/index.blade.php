@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="font-weight-bold">Daftar Order Masuk</h3>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                {{-- <a href="{{ route('tiket.new.create') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-solid fa-ticket mr-1"></i>New Ticket
                                </a> --}}
                            </div>
                            <table class="table table-striped" id="DataTables">
                                <thead>
                                    <tr>
                                        <th>No. Tiket</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Judul</th>
                                        <th>Unit</th>
                                        <th>Prioritas</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>cell</td>
                                        <td>cell</td>
                                        <td>cell</td>
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
@endsection()
