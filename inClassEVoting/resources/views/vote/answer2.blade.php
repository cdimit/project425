@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  <h1>{{$question->question}}</h1>
                  <br>
                  <a href="/question/{{$question->id}}/result2?answer2=1" class="btn btn-success btn-responsive">{{$question->A}}</a>
                  <br><br>
                  <a href="/question/{{$question->id}}/result2?answer2=2" class="btn btn-danger btn-responsive">{{$question->B}}</a>
                  <br><br>
                  <a href="/question/{{$question->id}}/result2?answer2=3" class="btn btn-warning btn-responsive">{{$question->C}}</a>
                  <br><br>
                  <a href="/question/{{$question->id}}/result2?answer2=4" class="btn btn-primary btn-responsive">{{$question->D}}</a>
                  <br>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
