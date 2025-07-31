@extends('layouts.app')

@section('title', 'Edit Track')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Track</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tracks.update', $track->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $track->name }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control">{{ $track->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image Filename:</label>
            <input type="text" name="img" class="form-control" value="{{ $track->img }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tracks.show', $track->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
