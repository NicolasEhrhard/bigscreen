@extends('layouts.app')

@section('content')

    <div class="accordion" id="accordionExample">
        @foreach($surveys as $survey)
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                            {{$survey->name}} : {{$survey->created_at}}
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        @foreach($survey->answers as $answer)
                            <h1>{{$answer->getQuestion()->title}}</h1>
                            <h3>{{$answer->value}}</h3>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection





