@extends('layouts.app')
@section('content')
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}">+ New</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->title }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <a href="{{ route('roles.edit', ['role' => $role]) }}">Edit</a>
                        <form action="{{ route('roles.destroy', ['role' => $role]) }}" method="post">
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