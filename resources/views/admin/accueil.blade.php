@extends('argon/layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            @foreach($allPieCharts as $pieChart)
                <div class="col-xl-6 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">{{$pieChart->title}}</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie">
                                <canvas id="{{$pieChart->id}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script>

                    var myPieChart = new Chart(document.getElementById({{$pieChart->id}}), {
                        type: 'pie',
                        data: {
                            labels: @json($pieChart->labels),
                            datasets: [{
                                data: @json($pieChart->datas),
                                backgroundColor: @json($pieChart->colors),
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                labels: {
                                    render: 'value',
                                }
                            }
                        },
                    });
                </script>
            @endforeach

            @foreach($allRadarCharts as $radarChart)
                <div class="col-xl-6 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">{{$radarChart->title}}</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie">
                                <canvas id="{{$radarChart->id}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    new Chart(document.getElementById({{$radarChart->id}}), {
                        type: 'radar',
                        data: {
                            labels: @json($radarChart->labels),
                            datasets: [{
                                label: @json($radarChart->labels),
                                data: @json($radarChart->datas),
                                backgroundColor: @json($radarChart->colors),
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scale: {
                                ticks: {
                                    beginAtZero: true,
                                },
                            },
                        }
                    });
                </script>
            @endforeach

        </div>

    </div>
@endsection

