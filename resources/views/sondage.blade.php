<h1>SONDAGE</h1>


@foreach($surveys as $survey)
    @foreach($survey->answers as $answer)
        <h1>{{$answer->getQuestion()->title}}</h1>
        <h3>{{$answer->value}}</h3>
    @endforeach
@endforeach




