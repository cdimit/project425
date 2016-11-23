@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div class="container">
                    <strong>Hello {{$user->first_name}}</strong>
                    <br>
                    <a href="/dashboard/course/create" class="btn btn-default">Create Course</a>
                    <a href="/dashboard/question/create" class="btn btn-default">Create Question</a><br>
<hr>

                        @for ($i=0; $i < $user->courses->count() ; $i++)

                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?=$i?>"><?= $user->courses[$i]->code ?> : <?= $user->courses[$i]->name ?></button>
                          <div id="demo<?=$i?>" class="collapse">
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/edit" class="btn btn-default">Edit Course</a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/question" class="btn btn-default">View Questions </a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/stats" class="btn btn-default">View Stats </a>
                          </div>
                          <br><br>
                          @endfor
  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
