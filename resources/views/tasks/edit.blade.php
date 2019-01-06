@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="row">
      <form class="" action="{{ action('TaskController@update', $task->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="task" class="col-md-4 col-form-label text-md-right">{{ __('Task') }}</label>

            <div class="col-md-6">
                <input id="task" type="text" class="form-control{{ $errors->has('task') ? ' is-invalid' : '' }}" name="task" value="{{ $task->task }}">

                @if ($errors->has('task'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('task') }}</strong>
                    </span>
                @endif
            </div>

            <input type="submit" name="submit" value="Update" class="btn btn-success">
      </form>
    </div>
  </div>
</div>
@endsection
