@extends('layouts.app') {{-- or your main layout --}}

@section('content')
<div class="container">
    <h2>Create New Track</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Track Name -->
        <div>
            <label for="name">Track Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div>
            <label for="img">Track Image</label>
            <input type="file" name="img" id="img">
            @error('img')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Dropdown -->
        <div>
            <label for="course_id">Select Course</label>
            <select name="course_id" id="course_id" required>
                <option value="">-- Choose Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Create Track</button>
    </form>
</div>
@endsection
