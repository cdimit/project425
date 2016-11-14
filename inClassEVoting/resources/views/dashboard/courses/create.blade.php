@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Courses</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/course/create') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Counrse Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('question') }}" required>

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('A') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Course Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('A') }}" required>

                                @if ($errors->has('A'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('A') }}</strong>
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
