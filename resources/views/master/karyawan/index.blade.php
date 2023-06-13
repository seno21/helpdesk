@extends('layout.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data tabel karyawan</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                @include('partials.flash_messages')
                <a href="{{ route('master.karyawan.create') }}" class="btn btn-primary">Tambah</a>
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>AKsi</td>
                    </tr>
                    @foreach ($karyawans as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="{{ route('master.karyawan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('master.karyawan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
