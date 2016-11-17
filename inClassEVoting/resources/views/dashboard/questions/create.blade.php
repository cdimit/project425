@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Questions</div>
                <div class="panel-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      <strong>{{ session('status') }}</strong>
                    </div>
                  @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/question/create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="question" class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}" required>

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('A') ? ' has-error' : '' }}">
                            <label for="A" class="col-md-4 control-label">A</label>

                            <div class="col-md-6">
                                <input id="A" type="text" class="form-control" name="A" value="{{ old('A') }}" required>

                                @if ($errors->has('A'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('A') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('B') ? ' has-error' : '' }}">
                            <label for="B" class="col-md-4 control-label">B</label>

                            <div class="col-md-6">
                                <input id="B" type="text" class="form-control" name="B" value="{{ old('B') }}" required>

                                @if ($errors->has('B'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('B') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('C') ? ' has-error' : '' }}">
                            <label for="C" class="col-md-4 control-label">C</label>

                            <div class="col-md-6">
                                <input id="C" type="text" class="form-control" name="C" value="{{ old('C') }}" required>

                                @if ($errors->has('C'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('C') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('D') ? ' has-error' : '' }}">
                            <label for="D" class="col-md-4 control-label">D</label>

                            <div class="col-md-6">
                                <input id="D" type="text" class="form-control" name="D" value="{{ old('D') }}" required>

                                @if ($errors->has('D'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('D') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('solution') ? ' has-error' : '' }}">
                            <label for="solution" class="col-md-4 control-label">Solution</label>

                            <div class="col-md-6">
                                <input type="radio" name="solution" value="A"> A
                                <input type="radio" name="solution" value="B"> B
                                <input type="radio" name="solution" value="C"> C
                                <input type="radio" name="solution" value="C"> D
                                @if ($errors->has('solution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('solution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
                            <label for="course_id" class="col-md-4 control-label">Course Id</label>

                            <div class="col-md-6">
                              <select name="course_id">
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}} - {{$course->code}}</option>
                                @endforeach
                              </select>
                                @if ($errors->has('course_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="label" class="col-md-4 control-label">Label</label>

                            <div class="col-md-6">
                                <input id="label" type="text" class="form-control" name="label" value="{{ old('label') }}" required>

                                @if ($errors->has('label'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('seconds') ? ' has-error' : '' }}">
                            <label for="seconds" class="col-md-4 control-label">Seconds</label>

                            <div class="col-md-6">
                                <input id="seconds" type="text" class="form-control" name="seconds" value="{{ old('seconds') }}" required>

                                @if ($errors->has('seconds'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seconds') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('chapter') ? ' has-error' : '' }}">
                            <label for="chapter" class="col-md-4 control-label">Chapter</label>

                            <div class="col-md-6">
                                <input id="chapter" type="text" class="form-control" name="chapter" value="{{ old('chapter') }}" required>

                                @if ($errors->has('chapter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chapter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>







                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
