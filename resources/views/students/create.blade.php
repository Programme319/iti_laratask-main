@extends('layouts.app') {{-- or your layout --}}

@section('content')
<div class="container">
    <h2>Create New Student</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Student Name -->
        <div>
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone -->
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gender -->
        <div>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="">-- Choose Gender --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address -->
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address" required>{{ old('address') }}</textarea>
            @error('address')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image">Student Image</label>
            <input type="file" name="image" id="image">
            @error('image')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Track Dropdown -->
        <div>
            <label for="track_id">Select Track</label>
            <select name="track_id" id="track_id" required>
                <option value="">-- Choose Track --</option>
                @foreach($tracks as $track)
                    <option value="{{ $track->id }}" {{ old('track_id') == $track->id ? 'selected' : '' }}>
                        {{ $track->name }}
                    </option>
                @endforeach
            </select>
            @error('track_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit">Create Student</button>
    </form>
</div>
@endsection