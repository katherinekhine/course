@extends('layouts.app')
@section('content')
    <h1 class="my-2">Roles</h1>
    <a href="{{ route('roles.create') }}">+ New</a>
    <table class="table table-bordered">
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
                        <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-link">Edit</a>
                        <form action="{{ route('roles.destroy', ['role' => $role]) }}" class="d-inline">
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
