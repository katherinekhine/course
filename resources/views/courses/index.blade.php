@extends('layouts.app')
@section('content')
    <h1>all course</h1>
    <a href="{{ route('courses.create') }}">+ New Course</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        @auth
                            @if (!auth()->user()->courses->contains($course->id))
                                <a href="{{ route('course.register', ['course' => $course->id]) }}">Register</a>
                            @else
                                <a href="{{ route('course.unregister', ['course' => $course->id]) }}">Unregister</a>
                            @endif
                        @endauth
                        <a href="{{ route('courses.show', ['course' => $course]) }}">Show</a>
                        <a href="{{ route('courses.edit', ['course' => $course]) }}">Edit</a>
                        <form action="{{ route('courses.destroy', ['course' => $course]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
