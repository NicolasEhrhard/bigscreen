@extends('layouts.app')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    @foreach($allPieCharts as $pieChart)
                        <div class="col-xl-4 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{$pieChart->title}}</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="{{$pieChart->id}}"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>

                            new Chart(document.getElementById({{$pieChart->id}}), {
                                type: 'pie',
                                data: {
                                    labels: @json($pieChart->labels),
                                    datasets: [{
                                        data: @json($pieChart->datas),
                                        backgroundColor: @json($pieChart->colors),
                                    }],
                                },
                            });
                        </script>
                    @endforeach

                        @foreach($allRadarCharts as $radarChart)
                            <div class="col-xl-4 col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">{{$radarChart->title}}</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4">
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
                                            data: @json($radarChart->datas),
                                            backgroundColor: @json($radarChart->colors),
                                        }],
                                    },
                                });
                            </script>
                        @endforeach

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
@endsection

