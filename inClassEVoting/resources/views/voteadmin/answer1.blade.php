@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  {{$question->question}}
                  <br>
                  <a href="#" class="btn btn-success">{{$question->A}}</a>
                  <br>
                  <a href="#" class="btn btn-danger">{{$question->B}}</a>
                  <br>
                  <a href="#" class="btn btn-warning">{{$question->C}}</a>
                  <br>
                  <a href="#" class="btn btn-primary">{{$question->D}}</a>
                  <br>
                  <a href="/admin/question/{{$question->id}}/result1" class="btn">Next</a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
