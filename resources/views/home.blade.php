@extends('layouts.app')

<?php

?>

@section('content')
    <div class="container">

        @if(Session::has('message'))
            <div class="alert">
                <p>{{Session::get('message')}}</p>
            </div>
        @endif

        @if(Session::has('success'))
            <div id="modal-close-default" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <h2 class="uk-modal-title">MERCI !</h2>
                    <h4>Ci-dessous le lien vers votre sondage</h4>
                    <p href="{{Session::get('success')}}" target="_blank">{{Session::get('success')}}</p>
                </div>
            </div>
            <div class="alert">
                <p>{{Session::get('success')}}</p>
            </div>
        @endif


        <div class="row justify-content-center">
            <div class="position-ref full-height">
                <form action="{{ action('AnswerController@store') }}" method="post">
                    {{csrf_field()}}
                    <fieldset class="uk-fieldset">

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
                                    @else
                                        <input required name="{{$question->id}}" value="{{old($question->title)}}" type="text"
                                               class="form-control"
                                               id="{{$question->title}}">
                                    @endif

                                @endif
                                @if($question->questionType == 'numeric')
                                    <div required class="uk-form-controls">
                                        <label><input class="uk-radio" type="radio" name="{{$question->id}}">1</label>
                                        <label><input class="uk-radio" type="radio" name="{{$question->id}}">2</label>
                                        <label><input class="uk-radio" type="radio" name="{{$question->id}}">3</label>
                                        <label><input class="uk-radio" type="radio" name="{{$question->id}}">4</label>
                                        <label><input class="uk-radio" type="radio" name="{{$question->id}}">5</label>
                                    </div>
                                @endif
                                @if($question->questionType == 'choice')
                                    <div class="uk-form-controls">
                                        <select required name="{{$question->id}}"
                                                class="uk-select"
                                                id="form-stacked-select">
                                            @foreach($question->getChoices() as $choice)
                                                <option value="{{$choice}}">{{$choice}}</option>
                                            @endforeach
                                        </select>
                                        @if($question->checkSelectedChoice())
                                            <h1>AUTrE OKKKKKK</h1>
                                        @endif
                                    </div>
                                @endif
                            </div>

                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">ENVOYER !</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
