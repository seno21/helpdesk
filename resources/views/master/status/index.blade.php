@extends('layouts.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold">Master Data Status</h3>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-3">
                                    <a href="{{ route('master.status.create') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-solid fa-plus mr-1"></i>Tambah
                                    </a>
                                </div>
                                <table class="table table-striped" id="DataTables">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($statuses as $status)
                                            <tr>
                                                <td>{{ $status->status }}</td>
                                                <td>{{ $status->keterangan }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('master.status.edit', $status->id) }}"
                                                            class="ml-2 btn btn-sm btn-warning">
                                                            <i class="fa-solid fa-pen-to-square mr-1"></i>
                                                        </a>
                                                        <form class="ml-2"
                                                            action="{{ route('master.status.destroy', $status->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btnDelete">
                                                                <i class="fa-solid fa-trash mr-1"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
