@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Course: {{ $course->name }}</h2>

    @foreach ($course->tracks as $track)
        <div class="card mb-3">
            <div class="card-header">
                Track: {{ $track->name }}
            </div>
            <div class="card-body">
                @if ($track->students->isEmpty())
                    <p>No students in this track.</p>
                @else
                    <ul>
                        @foreach ($track->students as $student)
                            <li>{{ $student->name }} ({{ $student->email }})</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
</div>
@endsection
