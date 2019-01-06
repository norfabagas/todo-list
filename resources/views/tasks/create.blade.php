@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="row">
      <h2>New Task <a href="{{ url('tasks') }}" class="btn btn-info">View tasks</a></h2>
      <br>
      <form class="" action="{{ action('TaskController@store') }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="task" class="col-md-4 col-form-label text-md-right">{{ __('Task') }}</label>

            <div class="col-md-6">
                <input id="task" type="text" class="form-control{{ $errors->has('task') ? ' is-invalid' : '' }}" name="task" value="{{ old('task') }}">

                @if ($errors->has('task'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('task') }}</strong>
                    </span>
                @endif
            </div>

            <input type="submit" name="submit" value="submit" class="btn btn-success">
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
