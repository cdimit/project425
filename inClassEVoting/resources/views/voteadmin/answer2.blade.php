@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  <h1><div id="countdowntimer">{{$question->seconds}}</div></h1>
                  <h1>{{$question->question}}</h1>
                  <br><br>
                  <a href="#" class="btn btn-success">{{$question->A}}</a>
                  <br><br>
                  <a href="#" class="btn btn-danger">{{$question->B}}</a>
                  <br><br>
                  <a href="#" class="btn btn-warning">{{$question->C}}</a>
                  <br><br>
                  <a href="#" class="btn btn-primary">{{$question->D}}</a>
                  <br><br>

                  <a href="/admin/question/{{$question->id}}/result2" class="btn btn-primary btn-block">Next</a>


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
