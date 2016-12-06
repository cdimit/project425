@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Questions - {{$questions->first()->course->code}}</div>
                <div class="panel-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      <strong>{{ session('status') }}</strong>
                    </div>
                  @endif
                  <table id="example" class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th>Chapter</th>
                                  <th>Question</th>
                                  <th>A</th>
                                  <th>B</th>
                                  <th>C</th>
                                  <th>D</th>
                                  <th>Solution</th>
                                  <th>Seconds</th>
                                  <th>Options</th>

                               </tr>
                            </thead>
                           <tbody>

                           @foreach($questions as $que)
                               <tr>
                                  <td>{{ $que->chapter }}</td>
                                  <td data-toggle="tooltip" title="{{$que->question}}">{{ str_limit($que->question, 16) }}</td>
                                  <td data-toggle="tooltip" title="{{$que->A}}">{{ str_limit($que->A, 16) }}</td>
                                  <td data-toggle="tooltip" title="{{$que->B}}">{{ str_limit($que->B, 16) }}</td>
                                  <td data-toggle="tooltip" title="{{$que->C}}">{{ str_limit($que->C, 16) }}</td>
                                  <td data-toggle="tooltip" title="{{$que->D}}">{{ str_limit($que->D, 16) }}</td>
                                  <td>{{ $que->solution }}</td>
                                  <td>{{ $que->seconds  }}</td>
                                  <td><a href="/dashboard/question/{{$que->id}}/edit" class="btn btn-primary">Edit</a>

                                      @if($que->lock==1)

                                      <a href="/unlock/{{$que->id}}" class="btn btn-success">Unlock</a>

                                      <button type="button" class="btn " data-toggle="modal" data-target="#myLModal{{$que->id}}">Link</button>

                                      <div class="modal fade" id="myLModal{{$que->id}}" role="dialog">
                                         <div class="modal-dialog">

                                           <!-- Modal content-->
                                           <div class="modal-content">
                                             <div class="modal-body">
                                               <p>Copy to clipboard</p>
                                               <input type="text"  value="{{$_SERVER['SERVER_NAME']}}/unlock/{{$que->id}}">
                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                             </div>
                                           </div>

                                         </div>
                                       </div>


                                      @else
                                      <a href="/lock/{{$que->id}}" class="btn btn-warning">Lock</a>




                                      @endif
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$que->id}}">Delete</button>

                                      <div class="modal fade" id="myModal{{$que->id}}" role="dialog">
                                         <div class="modal-dialog">

                                           <!-- Modal content-->
                                           <div class="modal-content">
                                             <div class="modal-body">
                                               <p>Are you sure?</p>
                                             </div>
                                             <div class="modal-footer">
                                               <a href="/delete/question/{{$que->id}}" class="btn btn-danger">Delete</a>
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                             </div>
                                           </div>

                                         </div>
                                       </div>



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
$(document).ready(function(){
    $('#example').dataTable();
});
</script>

@endsection
