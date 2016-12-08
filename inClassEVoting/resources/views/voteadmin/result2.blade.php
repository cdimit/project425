@extends('layouts.app')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.min.js"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">

                  <?php
                  $ansstr = "None";
                  switch ($question->solution) {
                    case 'A':
                      $ansstr = $question->A;
                      break;

                    case 'B':
                      $ansstr = $question->B;
                      break;

                    case 'C':
                      $ansstr = $question->C;
                      break;

                    case 'D':
                      $ansstr = $question->D;
                      break;

                  }
                  ?>
                  <h1>Answer: {{$ansstr}}</h1>


                  <canvas id="myChart"></canvas>
                    <br><br>
                    <h2><label class='label label-success' id="laper"></label></h2>
                    <h2><label class='label label-danger' id="lbper"></label></h2>
                    <h2><label class='label label-warning' id="lcper"></label></h2>
                    <h2><label class='label label-primary' id="ldper"></label></h2>
                    <a href="/dashboard" class="btn btn-primary btn-block">Finish</a>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
update();

function chart(a,b,c,d) {
  var all=parseInt(a)+parseInt(b)+parseInt(c)+parseInt(d);
  var aper=Math.round((a/all)*100 * 100) / 100;
  var bper=Math.round((b/all)*100 * 100) / 100;
  var cper=Math.round((c/all)*100 * 100) / 100;
  var dper=Math.round((d/all)*100 * 100) / 100;
  document.getElementById("laper").innerHTML=aper+'%';
  document.getElementById("lbper").innerHTML=bper+'%';
  document.getElementById("lcper").innerHTML=cper+'%';
  document.getElementById("ldper").innerHTML=dper+'%';
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["{{$question->A}}", "{{$question->B}}", "{{$question->C}}", "{{$question->D}}"],
        datasets: [{
            label: '# of Votes',
            data: [a,b,c,d],
            backgroundColor: [
                "#228b22",
                "#e00000",
                "#ffff00",
                "#1e90ff"

            ],
            hoverBackgroundColor: [
                "#228022",
                "#cb0000",
                "#ffe000",
                "#1e90e0"
            ]
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:false
                }
            }]
        },
        animation: {
          duration: 0
        }
    }
});

}

function update() {
	var xmlhttp=new XMLHttpRequest();
	var output = "";
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var output = this.responseText.split(' ');
        chart(output[0], output[1], output[2], output[3]);
				msgarea.scrollTop = msgarea.scrollHeight;
			}
		}
	      xmlhttp.open("GET","/chart_results2/{{$question->id}}" ,true);
	      xmlhttp.send();



}

setInterval(function(){ update() }, 2500);
</script>

@endsection
