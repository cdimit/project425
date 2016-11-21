@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">

                    Your answer is {{$answerstr}}

                    <br>
                    <a href="/" class="btn btn-default">Finish</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
