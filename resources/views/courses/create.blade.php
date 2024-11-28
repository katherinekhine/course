@extends('layouts.app')
@section('content')
    <h1>{{ isset($course) ? 'Update course' : 'New course' }}</h1>
    <form action="{{ isset($course) ? route('courses.update', ['course' => $course]) : route('courses.store') }}" method="post">
        @csrf
        @isset($course)
            @method('PUT')
        @endisset
        <ul>
            @foreach ($errors->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $course->title ?? '') }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ old('description', $course->description ?? '') }}">
        </div>
        <div>
            <button type="submit">{{ isset($course) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
@endsection