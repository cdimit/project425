@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      <strong>{{ session('status') }}</strong>
                    </div>
                  @endif
                  <div class="container">
                    <strong>Hello {{$user->first_name}}</strong>
                    <br>
                    <a href="/dashboard/course/create" class="btn btn-default">Create Course</a>
                    @if($user->courses->count()>0)
                    <a href="/dashboard/question/create" class="btn btn-default">Create Question</a><br>
                    @endif
<hr>

                        @for ($i=0; $i < $user->courses->count() ; $i++)
                          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?=$i?>"><?= $user->courses[$i]->code ?> : <?= $user->courses[$i]->name ?></button>
                          <div id="demo<?=$i?>" class="collapse">
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/edit" class="btn btn-default">Edit Course</a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/question" class="btn btn-default">View Questions </a>
                            <a href="/dashboard/<?= $user->courses[$i]->id ?>/stats" class="btn btn-default">View Stats </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$user->courses[$i]->id}}">Delete</button>

                            <div class="modal fade" id="myModal{{$user->courses[$i]->id}}" role="dialog">
                               <div class="modal-dialog">

                                 <!-- Modal content-->
                                 <div class="modal-content">
                                   <div class="modal-body">
                                     <p>Are you sure?</p>
                                   </div>
                                   <div class="modal-footer">
                                     <a href="/delete/course/<?= $user->courses[$i]->id ?>" class="btn btn-danger">Yes</a>
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                   </div>
                                 </div>

                               </div>
                             </div>
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
