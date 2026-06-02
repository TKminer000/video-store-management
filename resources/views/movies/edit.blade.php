@extends('layouts.app')

@section('title', 'Edit Movie — Video Store')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-film"></i> Edit Movie
        </div>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    <div class="form-card">
        <h2><i class="bi bi-pencil-square"></i> Edit Movie</h2>
        <form method="POST" action="{{ route('movies.update', $movie->movie_id) }}">
            @csrf @method('PUT')
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}">
            @error('title') <p class="error-msg">{{ $message }}</p> @enderror

            <label>Category</label>
            <select name="category">
                @foreach(['comedy','suspense','drama','action','SciFi'] as $cat)
                    <option value="{{ $cat }}" {{ old('category', $movie->category) == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
            @error('category') <p class="error-msg">{{ $message }}</p> @enderror

            <label>Director</label>
            <input type="text" name="director" value="{{ old('director', $movie->director) }}">
            @error('director') <p class="error-msg">{{ $message }}</p> @enderror

            <label>Year</label>
            <input type="number" name="year" value="{{ old('year', $movie->year) }}" min="1900" max="2099">
            @error('year') <p class="error-msg">{{ $message }}</p> @enderror

            <div class="form-footer">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                <a href="{{ route('movies.index') }}" class="btn btn-secondary"><i class="bi bi-x"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection