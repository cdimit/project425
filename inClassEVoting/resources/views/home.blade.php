@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                      @if($questions->count()==0)
                        No questions available
                      @else
                        @foreach($questions as $que)
                        <a href="/question/{{$que->id}}/answer1" class="btn btn-default">{{$que->course->code}}: {{$que->question}}</a>
                        <br>
                        <br>
                        @endforeach
                      @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
