@extends('layouts.app')

@section('title', 'All Courses')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Courses List</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-sm">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection