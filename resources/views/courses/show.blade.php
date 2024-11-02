@extends('layouts.app')
@section('content')
    <h1>detail of <em>{{ $course->title }}</em></h1>
    <p>{{ $course->description }}</p>
@endsection
