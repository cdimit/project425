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
                    <strong>Stats: {{$course->name}}-{{$course->code}}</strong>
                    <br><br>



                    <table id="example" class="table table-striped" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>A(1st vote/2nd vote)</th>
                                    <th>B(1st vote/2nd vote)</th>
                                    <th>C(1st vote/2nd vote)</th>
                                    <th>D(1st vote/2nd vote)</th>
                                 </tr>
                              </thead>
                             <tbody>
                               <?php  $c1="";$c2="";$c3="";$c4="";?>
                             @foreach($course->questions as $que)

                                 <tr>
                                   <?php
                                   if($que->solution == 'A'){
                                      $c1="#9de7d7";
                                      $c2="";$c3="";$c4="";}
                                   if($que->solution == 'B'){
                                      $c2="#9de7d7";
                                      $c1="";$c3="";$c4="";}
                                   if($que->solution == 'C'){
                                      $c3="#9de7d7";
                                      $c1="";$c2="";$c4="";}
                                   if($que->solution == 'D'){
                                      $c4="#9de7d7";
                                      $c1="";$c2="";$c3="";}
                                  ?>

                                    <td>{{ $que->question }}</td>
                                    <td bgcolor={{$c1}}>{{$answer1->where('question_id',$que->id)->where('answer',1)->count()}}/{{$answer2->where('question_id',$que->id)->where('answer',1)->count()}}</td>
                                    <td bgcolor={{$c2}}>{{$answer1->where('question_id',$que->id)->where('answer',2)->count()}}/{{$answer2->where('question_id',$que->id)->where('answer',2)->count()}}</td>
                                    <td bgcolor={{$c3}}>{{$answer1->where('question_id',$que->id)->where('answer',3)->count()}}/{{$answer2->where('question_id',$que->id)->where('answer',3)->count()}}</td>
                                    <td bgcolor={{$c4}}>{{$answer1->where('question_id',$que->id)->where('answer',4)->count()}}/{{$answer2->where('question_id',$que->id)->where('answer',4)->count()}}</td>

                                 </tr>
                              @endforeach

                             </tbody>

                      </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
