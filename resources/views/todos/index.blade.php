@extends('layout.common')

@section('content')
  <ul>
    @foreach($todos as $todo)
      <li>
        <small>{{ $todo->updated_at }}</small> : {{ $todo->body }}
      </li>
    @endforeach
  </ul>
@endsection
