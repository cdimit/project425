@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Questions - {{$questions->first()->course->code}}</div>
                <div class="panel-body">

                  <table class=" table" id="example">
                            <thead>
                              <tr>
                                  <th>Chapter</th>
                                  <th>Question</th>
                                  <th>A</th>
                                  <th>B</th>
                                  <th>C</th>
                                  <th>D</th>
                                  <th>Label</th>
                                  <th>Seconds</th>
                                  <th>Options</th>

                               </tr>
                            </thead>
                           <tbody>

                           @foreach($questions as $que)

                               <tr>
                                  <td>{{ $que->chapter }}</td>
                                  <td>{{ $que->question }}</td>
                                  <td>{{ $que->A }}</td>
                                  <td>{{ $que->B }}</td>
                                  <td>{{ $que->C }}</td>
                                  <td>{{ $que->D }}</td>
                                  <td>{{ $que->label }}</td>
                                  <td>{{ $que->seconds  }}</td>
                                  <td><a href="/dashboard/question/{{$que->id}}/edit" class="btn btn-primary">Edit</a>

                                      @if($que->lock==1)

                                      <a href="/unlock/{{$que->id}}" class="btn btn-success">Unlock</a>

                                      @else
                                      <a href="/lock/{{$que->id}}" class="btn btn-warning">Lock</a>
                                      @endif

                                      <a href="/delete/question/{{$que->id}}" class="btn btn-danger">Delete</a>


                                  </td>
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
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endsection
