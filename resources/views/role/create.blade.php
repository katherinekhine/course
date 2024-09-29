@extends('layouts.app')
@section('content')
    <h1 class="my-2">Create New Roles</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tilte">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-dark"><a href="{{ route('roles.index') }}">Back</a>
            </button>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
@endsection
