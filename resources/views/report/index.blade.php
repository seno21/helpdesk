@extends('layouts.main')
@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <h3 class="card-title">DIAGRAM REPORT HELPDESK TICKETING</h3>
            <form class="forms-sample" method="GET" action="{{ route('laporan') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal" id="tgl_awal"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="mb-3 btn btn-primary mr-2 btn-toolbar">
                    <i class="fa-solid fa-filter mr-1"></i>Filter
                </button>
            </form>
            <div class="row">
                <div class="col-md-12">

                    <div id="kategori" style="width:100%; height:400px;"></div>
                </div>
            </div>

            @php
                $data = [];
                foreach ($kategoris as $kategori) {
                    $data[] = $kategori->nama;
                }
            @endphp

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const chart = Highcharts.chart('kategori', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Diagram Laporan Kerusakan <br> Periode: '
                        },
                        xAxis: {
                            categories: @json($data)
                        },
                        yAxis: {
                            title: {
                                text: 'Jumlah Kerusakan'
                            }
                        },
                        series: [{
                            name: @json($data),
                            data: [1, 5, 4]
                        }]
                    });
                });
            </script>

        </div>
    </div>
@endsection()
