@extends('layout.common')

@section('content')
  <ul>
    <li>{{ $todo->id }}</li>
    <li>{{ $todo->body }}</li>
    <li>{{ $todo->updated_at }}</li>
  </ul>
@endsection
