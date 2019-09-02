@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($surveys as $survey)

            @foreach($survey->userSurveys as $userSurvey)

                <div class="card shadow mb-4">

                    <div class="card-body">

                        <p>{{$survey->name}} de : <strong>{{$userSurvey->getUser()->email}}</strong></p>
                        <p class="mb-4">Sondage réalisé le : {{$userSurvey->created_at}}</p>

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
                                @foreach($userSurvey->answers as $answer)
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

        @endforeach
    </div>
@endsection

