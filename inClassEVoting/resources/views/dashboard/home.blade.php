@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Hello Admin
                    <br>
                    <a href="/dashboard/question/create" class="btn btn-primary">Create Question</a>
                    <a href="/dashboard/course/create" class="btn btn-primary">Add Course</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
