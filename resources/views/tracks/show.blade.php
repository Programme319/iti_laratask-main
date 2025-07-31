@extends('layouts.app')

@section('title', 'Track Students')

@section('content')
<div class="container mt-5">
    <h2>{{ $track->name }} - Students</h2>

    @if ($track->students->isEmpty())
        <p>No students enrolled in this track yet.</p>
    @else
        <ul>
            @foreach ($track->students as $student)
                <li>{{ $student->name }} ({{ $student->email }})</li>
            @endforeach
        </ul>
    @endif
        <p><strong>Course:</strong> {{ $track->course->name ?? 'Not Assigned' }}</p>

    <a href="{{ route('tracks.index') }}" class="btn btn-secondary mt-3">Back to Tracks</a>
</div>
@endsection
