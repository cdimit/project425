@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  <h1><div id="countdowntimer">{{$question->seconds}}</div></h1>
                  <h1>{{$question->question}}</h1>
                  <br>
                  <h2><span class="label label-success ">{{$question->A}}</span></h2>
                  <h2><span class="label label-danger">{{$question->B}}</span></h2>
                  <h2><span class="label label-warning">{{$question->C}}</span></h2>
                  <h2><span class="label label-primary">{{$question->D}}</span></h2>
                  <br><br>
                  <a href="/admin/question/{{$question->id}}/result1" class="btn btn-primary btn-block">Next</a>


                  <script type="text/javascript">
                    var timeleft = {{$question->seconds}};
                    var downloadTimer = setInterval(function(){
                      timeleft--;
                      document.getElementById("countdowntimer").textContent = timeleft;
                      if(timeleft <= 0)
                      clearInterval(downloadTimer);
                    },1000);
                  </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
