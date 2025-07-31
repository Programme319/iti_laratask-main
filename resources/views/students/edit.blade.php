@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

<div class="container">
    <h1 class="mb-4">Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" required>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Change Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
