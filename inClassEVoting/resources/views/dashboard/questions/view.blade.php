@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Questions - {{$questions->first()->course->code}}</div>
                <div class="panel-body">

                  <table class="table table-striped" id="example">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Chapter</th>
                                  <th>Question</th>
                                  <th>A</th>
                                  <th>B</th>
                                  <th>C</th>
                                  <th>D</th>
                                  <th>Label</th>
                                  <th>Seconds</th>

                               </tr>
                            </thead>
                           <tbody>

                           @foreach($questions as $que)

                               <tr>
                                  <td>{{ $que->id }}</td>
                                  <td>{{ $que->chapter }}</td>
                                  <td>{{ $que->question }}</td>
                                  <td>{{ $que->A }}</td>
                                  <td>{{ $que->B }}</td>
                                  <td>{{ $que->C }}</td>
                                  <td>{{ $que->D }}</td>
                                  <td>{{ $que->label }}</td>
                                  <td>{{ $que->seconds  }}</td>
                               </tr>
                            @endforeach

                           </tbody>

                      </table>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
$("#example").dataTable();
</script>

@endsection
