@extends('argon/layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <a class="btn btn-primary" style="color:white" onclick="goTo()" role="button">Rechercher</a>
            </div>
            <input type="email" id="searchByEMail" class="form-control" placeholder="Veuillez entrer une adresse email">
        </div>
        <script>
            function goTo() {
                if (document.getElementById("searchByEMail").value) {
                    document.location = "#" + document.getElementById("searchByEMail").value
                }
            }
        </script>

        @foreach($surveys as $survey)

            @foreach($survey->userSurveys as $userSurvey)

                <div class="card shadow mb-4" id="{{$userSurvey->getUser()->email}}">

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
                                        <td>{{$answer->getQuestionNumber()}}</td>
                                        <td>{{$answer->getQuestionTitle()}}</td>
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

