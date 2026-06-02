@extends('layouts.app')

@section('title', 'Tapes — Video Store')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-cassette"></i> Tapes
        </div>
        <a href="{{ route('tapes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Tape
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
                    <th>Tape #</th>
                    <th>Movie</th>
                    <th>Format</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tapes as $tape)
                <tr>
                    <td>{{ $tape->tape_number }}</td>
                    <td>{{ $tape->movie_title }}</td>
                    <td>
                        <span class="badge {{ $tape->format == 'VHS' ? 'badge-vhs' : 'badge-beta' }}">
                            {{ $tape->format }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('tapes.edit', $tape->tape_number) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            @if(session('role') == 'admin')
                            <form method="POST" action="{{ route('tapes.destroy', $tape->tape_number) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Delete this tape?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;color:#475569;padding:2rem;">No tapes yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection