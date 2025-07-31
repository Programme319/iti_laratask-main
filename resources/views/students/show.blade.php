@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="container">
    <h1>Student Info</h1>

    <div class="card">
        <div class="card-body">
            @if($student->image)
                <img src="{{ asset('storage/' . $student->image) }}" width="100" height="100" class="mb-3">
            @endif

            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Phone:</strong> {{ $student->phone }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>

            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
