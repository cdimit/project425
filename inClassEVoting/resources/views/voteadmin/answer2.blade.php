@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  @if($question->header_pic!=null)
                  <img class="img-responsive" src="/img/{{$question->header_pic}}" />
                  @endif
                  <h1><div id="countdowntimer">{{$question->seconds}}</div></h1>
                  <h1>{{$question->question}}</h1>
                  <br>
                  <a href="#" class="btn btn-success btn-lg btn-block btn-responsive">{{$question->A}}</a>
                  <br>
                  <a href="#" class="btn btn-danger btn-lg btn-block btn-responsive">{{$question->B}}</a>
                  <br>
                  <a href="#" class="btn btn-warning btn-lg btn-block btn-responsive">{{$question->C}}</a>
                  <br>
                  <a href="#" class="btn btn-primary btn-lg btn-block btn-responsive">{{$question->D}}</a>
                  <br><br>

                  <a href="/admin/question/{{$question->id}}/result2" class="btn btn-info btn-block">Next</a>


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
