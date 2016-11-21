@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <strong>Hello {{$user->email}}</strong>
                    <br>
                    <!-- <a href="/dashboard/course" class="btn btn-default">My Courses ({{$user->courses->count()}})</a><br> -->
                    <!-- <a href="/dashboard/question" class="btn btn-default">My Questions </a> -->

                      <?php
                        for ($i=0; $i < $user->courses->count() ; $i++) {
                          ?>

                        <div class="container">
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?=$i?>"><?= $user->courses[$i]->code ?> : <?= $user->courses[$i]->name ?></button>
                          <div id="demo<?=$i?>" class="collapse">
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/edit" class="btn btn-default">Edit Course</a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/addquestion" class="btn btn-default">Add Question</a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/uestions" class="btn btn-default">View Questions </a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/stats" class="btn btn-default">View Stats </a>

                          </div>
                        </div>


                      <?php
                        }
                        ?>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
