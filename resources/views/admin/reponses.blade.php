@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($surveys as $survey)
            <div class="card shadow mb-4">

                <div class="card-body">

                    <p>{{$survey->name}} de : <strong>{{$survey->getUser()->email}}</strong></p>
                    <p class="mb-4">Sondage réalisé le : {{$survey->created_at}}</p>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Numéro de la question</th>
                                <th>Corps de la question</th>
                                <th>Réponse</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($survey->answers as $answer)
                                <tr>
                                    <td>{{$answer->getQuestion()->number}}</td>
                                    <td>{{$answer->getQuestion()->title}}</td>
                                    <td>{{$answer->value}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection

