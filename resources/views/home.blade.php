@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('message'))
            <div class="alert alert-danger" role="alert">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <p>Toute l’équipe de ​ Bigscreen ​ vous remercie pour votre engagement.<br>
                    Grâce à votre investissement, nous vous préparons une application toujours plus facile à utiliser,
                    seul ou en famille.<br>
                    Pour consulter vos réponses ultérieurement, <a
                        href="http://localhost:8000/sondages/{{Session::get('success')}}"> cliquez-ici </a>
                </p>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="alert alert-info" role="alert">
                    <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
                </div>
                <div class="position-ref full-height">
                    <form action="{{ action('HomeController@store') }}" method="post">
                        {{csrf_field()}}
                        <fieldset class="uk-fieldset">

                            <input type="number" hidden name="surveyId" value="{{$surveyId}}">


                            @foreach($questions as $question)

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong> Question </strong> <span
                                                class="badge badge-secondary"> {{$question->number}}
                                        /{{$questions->count()}} </span></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$question->title}}</h6>
                                        @if($question->questionType == 'saisie')
                                            @if($question->title == 'Votre adresse mail')
                                                <input required name="email" value="{{old('email')}}" type="email"
                                                       class="form-control"
                                                       id="{{$question->title}}">
                                            @elseif($question->title == 'Votre âge')
                                                <input required name="{{$question->id}}"
                                                       value="{{old($question->id)}}"
                                                       type="number"
                                                       class="form-control"
                                                       id="{{$question->title}}">
                                            @else
                                                <input required name="{{$question->id}}"
                                                       value="{{old($question->id)}}"
                                                       type="text"
                                                       class="form-control"
                                                       id="{{$question->title}}">
                                            @endif

                                        @endif
                                        @if($question->questionType == 'numeric')
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" required name="{{$question->id}}"
                                                           type="radio" {{ (old("$question->id") == 1 ? "checked":"") }}
                                                           id="inlineCheckbox1" value="1">
                                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="{{$question->id}}"
                                                           type="radio" {{ (old("$question->id") == 2 ? "checked":"") }}
                                                           id="inlineCheckbox1" value="2">
                                                    <label class="form-check-label" for="inlineCheckbox1">2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="{{$question->id}}"
                                                           type="radio" {{ (old("$question->id") == 3 ? "checked":"") }}
                                                           id="inlineCheckbox1" value="3">
                                                    <label class="form-check-label" for="inlineCheckbox1">3</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="{{$question->id}}"
                                                           type="radio" {{ (old("$question->id") == 4 ? "checked":"") }}
                                                           id="inlineCheckbox1" value="4">
                                                    <label class="form-check-label" for="inlineCheckbox1">4</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="{{$question->id}}"
                                                           type="radio" {{ (old("$question->id") == 5 ? "checked":"") }}
                                                           id="inlineCheckbox1" value="5">
                                                    <label class="form-check-label" for="inlineCheckbox1">5</label>
                                                </div>
                                            </div>
                                        @endif
                                        @if($question->questionType == 'choice')
                                            <select required name="{{$question->id}}" id="{{$question->id}}"
                                                    onchange="checkValue({{$question->id}})" class="form-control">
                                                @foreach(unserialize($question->choice) as $choice)
                                                    <option {{ (old("$question->id") == $choice ? "selected":"") }} value="{{$choice}}">{{$choice}}</option>
                                                @endforeach
                                            </select>
                                            <script>
                                                function checkValue(id) {
                                                    if (document.getElementById(id).value == 'Autre') {
                                                        document.getElementById("dede" + id).style.display = 'block';
                                                        document.getElementById("dede" + id).tagName = id;
                                                        document.getElementById(id).tagName = "";
                                                    }
                                                }
                                            </script>

                                            <textarea class="form-control" style="display: none"
                                                      id="dede{{$question->id}}"
                                                      value="{{$choice}}"></textarea>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                                <div class="card">
                                    <button type="submit" class="btn btn-default">Finaliser</button>
                                </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        @endif

    </div>
@endsection
