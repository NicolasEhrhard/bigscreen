@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('message'))
            <div class="alert alert-danger" role="alert">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <p>Merci d'avoir participé a notre sondage!</p>
                <p>Voici un lien vous permettant de visionner vos différents sondages : <br></p>
                <p>{{Session::get('success')}}</p>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="position-ref full-height">
                <form action="{{ action('AnswerController@store') }}" method="post">
                    {{csrf_field()}}
                    <fieldset class="uk-fieldset">

                        <input type="number" hidden name="surveyId" value="{{$surveyId}}">

                        @foreach($questions as $question)
                            <div class="form-group">
                                <label for="{{$question->title}}"><strong> Question {{$question->number}}
                                        /{{$questions->count()}} </strong>
                                    <br>{{$question->title}}</label>
                                @if($question->questionType == 'saisie')
                                    @if($question->title == 'Votre adresse mail')
                                        <input required name="email" value="{{old('email')}}" type="email"
                                               class="form-control"
                                               id="{{$question->title}}">
                                    @elseif($question->title == 'Votre âge')
                                        <input required name="{{$question->id}}" value="{{old($question->title)}}"
                                               type="number"
                                               class="form-control"
                                               id="{{$question->title}}">
                                    @else
                                        <input required name="{{$question->id}}" value="{{old($question->title)}}"
                                               type="text"
                                               class="form-control"
                                               id="{{$question->title}}">
                                    @endif

                                @endif
                                @if($question->questionType == 'numeric')
                                    <div required class="uk-form-controls">
                                        <label><input type="radio" value="1" name="{{$question->id}}">1</label>
                                        <label><input type="radio" value="2" name="{{$question->id}}">2</label>
                                        <label><input type="radio" value="3" name="{{$question->id}}">3</label>
                                        <label><input type="radio" value="4" name="{{$question->id}}">4</label>
                                        <label><input type="radio" value="5" name="{{$question->id}}">5</label>
                                    </div>
                                @endif
                                @if($question->questionType == 'choice')
                                    <select required name="{{$question->id}}" class="form-control">
                                        @foreach($question->getChoices() as $choice)
                                            <option value="{{$choice}}">{{$choice}}</option>
                                        @endforeach
                                    </select>
                                    @if($question->checkSelectedChoice())
                                        <h1>AUTrE OKKKKKK</h1>
                                    @endif

                                @endif
                            </div>
                            <div class="dropdown-divider"></div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">ENVOYER !</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
