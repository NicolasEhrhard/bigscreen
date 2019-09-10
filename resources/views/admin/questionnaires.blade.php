@extends('argon/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Numéro de la question</th>
                            <th>Corps de la question</th>
                            <th>Type de la question</th>
                            <th>Nom du sondage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->number}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->questionType}}</td>
                                <td>{{$question->getSurvey()->name}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

