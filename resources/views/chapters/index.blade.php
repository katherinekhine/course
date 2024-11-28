@extends('layouts.app')
@section('content')
    <h1>all lessons</h1>
    <a href="{{ route('chapters.create') }}">+ new chapter</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
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
                        <form action="{{ route('chapters.destroy', ['chapter' => $chapter]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $chapters->links() }}
@endsection