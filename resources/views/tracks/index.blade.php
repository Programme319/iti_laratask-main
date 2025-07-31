<!DOCTYPE html>
<html>
<head>
    <title>All Tracks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        img { width: 100px; }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <x-navbar />

    <div class="container mt-4">
        <h1>All Course Tracks</h1>
        
        <a href="{{ route('tracks.create') }}" class="btn btn-success">+ Create New Track</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tracks as $track)
                    <tr>
                        <td>{{ $track->id }}</td>
                        <td>{{ $track->name }}</td>
                        <td>{{ $track->description }}</td>
                        <td><img src="{{ asset('images/' . $track->img) }}" width="80"></td>
                        <td>
                            <a href="{{ route('tracks.show', $track->id) }}" class="btn btn-sm btn-primary">Show</a>

                            <form action="{{ route('tracks.destroy', $track->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this track?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
