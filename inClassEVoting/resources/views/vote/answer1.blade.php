@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  @if($question->header_pic!=null)
                  <img class="img-responsive center-block" src="/img/{{$question->header_pic}}" />
                  @endif
                  <h1>{{$question->question}}</h1>
                  <br>
                  <a href="/question/{{$question->id}}/result1?answer1=1" class="btn btn-success btn-block btn-responsive">{{$question->A}}</a>
                  <br>
                  <a href="/question/{{$question->id}}/result1?answer1=2" class="btn btn-danger btn-block btn-responsive">{{$question->B}}</a>
                  <br>
                  <a href="/question/{{$question->id}}/result1?answer1=3" class="btn btn-warning btn-block btn-responsive">{{$question->C}}</a>
                  <br>
                  <a href="/question/{{$question->id}}/result1?answer1=4" class="btn btn-primary btn-block btn-responsive">{{$question->D}}</a>
                  <br>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
