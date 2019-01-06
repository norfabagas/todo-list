@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 col-offset-4">
    <div class="row">
      <h2>To Do List App <a class="btn btn-primary" href="{{ action('TaskController@create') }}">+</a></h2>
      <table class="table">
        <tr>
          <th>Task</th>
          <th>Action</th>
        </tr>
        @foreach($doing_tasks as $t)
        <tr>
          <td>{{ $t->task }}</td>
          <td>
          <a class="btn btn-info" href="{{ url('tasks/switch/' . $t->id) }}">Done</a>
          </td>
          <td>
            <a class="btn btn-success" href="{{ action('TaskController@edit', $t->id) }}">Edit</a>
          </td>
          <td>
            <form action="{{ action('TaskController@destroy', $t->id) }}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>

    <div class="row">
      <h2>Done tasks</h2>
      <table class="table">
        <tr>
          <th>Task</th>
          <th>Action</th>
        </tr>
        @foreach($done_tasks as $t)
        <tr>
          <td>{{ $t->task }}</td>
          <td>
            <a class="btn btn-warning" href="{{ url('tasks/switch/' . $t->id) }}">revert</a>
          </td>
          <td>
            <form action="{{ action('TaskController@destroy', $t->id) }}" method="post">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
