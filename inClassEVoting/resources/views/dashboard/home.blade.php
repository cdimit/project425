@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <strong>Hello {{$user->first_name}}</strong>
                    <br>
                    <a href="/dashboard/course" class="btn btn-default">My Courses ({{$user->courses->count()}})</a><br>
                    <a href="/dashboard/question" class="btn btn-default">My Questions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
