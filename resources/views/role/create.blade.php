@extends('layouts.app')
@section('content')
    <h1 class="my-2">{{ isset($role) ? 'Update Role' : 'Create New Role' }}</h1>
    <form action="{{ isset($role) ? route('roles.update', ['role' => $role]) : route('roles.store') }}" method="post">
        @csrf
        @isset($role)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control"
                value="{{ old('title', $role->title ?? '') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control"
                value="{{ old('description', $role->description ?? '') }}">
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn {{ isset($role) ? 'btn-outline-info' : 'btn-outline-primary' }}">
                {{ isset($role) ? 'Update' : 'Submit' }}
            </button>
        </div>
    </form>
@endsection
