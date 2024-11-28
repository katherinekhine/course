@extends('layouts.app')
@section('content')
    <h1>{{ isset($chapter) ? 'Update Chapter' : 'New Chapter' }}</h1>
    <form action="{{ isset($chapter) ? route('chapters.update', ['chapter' => $chapter]) : route('chapters.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @isset($chapter)
            @method('PUT')
        @endisset
        <ul>
            @foreach ($errors->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
        <div>
            <label for="title">Title:</label>
            <input type="text" placeholder="Enter chapter title" name="title"
                value="{{ old('title', $chapter->title ?? '') }}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Detail about the chapter"
                value="{{ old('description', $chapter->description ?? '') }}">
        </div>
        <div>
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected($course->id == $chapter->course_id)>{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="video">Video</label>
            <input type="file" name="video"><br>
            <video src="{{ asset('storage/' . $chapter->video) }}" controls width="200"></video>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
