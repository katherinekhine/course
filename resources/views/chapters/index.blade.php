@extends('layouts.app')
@section('content')
    <h1>All Lessons</h1>
    <a href="{{ route('chapters.create') }}">+ New Chapter</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chapters as $chapter)
                <tr>
                    <td>{{ $chapter->id }}</td>
                    <td>{{ $chapter->title }}</td>
                    <td>
                        <a href="{{ route('chapters.show', ['chapter' => $chapter]) }}">Show</a>
                        <a href="{{ route('chapters.edit', ['chapter' => $chapter]) }}">Edit</a>
                        <form action="{{ route('chapters.destroy', ['chapter' => $chapter]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $chapters->links() }}
@endsection
