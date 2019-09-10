@extends('layouts.app')

@section('content')
    <div class="container">

        <h4>Vous trouverez ci-dessous les réponses que vous avez apportés à notre sondage :</h4>

        <div class="accordion" id="accordionExample">
            @foreach($userSurveys as $userSurvey)
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                                {{$userSurvey->getSurvey()->name}} : {{$userSurvey->getSurvey()->created_at}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Corps de la question</th>
                                    <th>Réponse</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userSurvey->answers as $answer)
                                    <tr>
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
        </div>

    </div>


@endsection





