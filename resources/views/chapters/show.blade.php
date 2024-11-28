@extends('layouts.app')
@section('content')
    <p>Chapter Title:{{ $chapter->title }}</p>
    <video src="{{ asset('storage/'.$chapter->video) }}" controls width="500"></video>
    <div>
        <label for="description">Description:</label>
        <p>{{ $chapter->description }}</p>
    </div>
    <div>
        <label for="course">Course:</label>
        <p>{{ $chapter->course->title }}</p>
    </div>
    <div>
        <label for="">Uploaded_by:</label>
        <p>{{ $chapter->owner->name }}</p>
    </div>
@endsection