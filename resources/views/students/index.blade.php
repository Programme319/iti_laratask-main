@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Students</h2>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Track</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->track->name ?? 'N/A' }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <img src="{{ asset('images/students/' . $student->image) }}" alt="Student Image" width="50">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination links --}}
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
