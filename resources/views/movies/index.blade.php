@extends('layouts.app')

@section('title', 'Movies — Video Store')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-film"></i> Movies
        </div>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Movie
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Director</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                <tr>
                    <td>{{ $movie->movie_id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('movies.edit', $movie->movie_id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            @if(session('role') == 'admin')
                            <form method="POST" action="{{ route('movies.destroy', $movie->movie_id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Delete this movie?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;color:#475569;padding:2rem;">No movies yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection