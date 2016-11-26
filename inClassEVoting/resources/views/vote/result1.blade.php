@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.min.js"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->course->code}} : {{$question->course->name}}</div>

                <div class="panel-body">
                  <canvas id="myChart"></canvas>

                    Your answer is {{$answerstr}}

                    <br>
                    <a href="/question/{{$question->id}}/answer2" class="btn btn-default">Next</a>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
update();

function chart(a,b,c,d) {
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
                "#8b0000",
                "#ffff00",
                "#1e90ff"

            ],
            hoverBackgroundColor: [
                "#228b22",
                "#8b0000",
                "#ffff00",
                "#1e90ff"

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
	      xmlhttp.open("GET","/chart_results1/{{$question->id}}" ,true);
	      xmlhttp.send();



}

setInterval(function(){ update() }, 2500);
</script>

@endsection
