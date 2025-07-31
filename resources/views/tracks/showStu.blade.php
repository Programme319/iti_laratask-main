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