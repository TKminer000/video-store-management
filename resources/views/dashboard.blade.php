@extends('layouts.app')

@section('title', 'Dashboard — Video Store')

@section('content')
<div class="container">
    <div class="welcome-box">
        <h2>Welcome back, {{ session('name') }} :D</h2>
        <p>Manage your video store inventory below.</p>
    </div>

    <div class="cards-grid">
        <a href="{{ route('movies.index') }}" class="dash-card">
            <i class="bi bi-film"></i>
            <h3>Movies</h3>
            <p>Manage movies</p>
        </a>
        <a href="{{ route('tapes.index') }}" class="dash-card">
            <i class="bi bi-cassette"></i>
            <h3>Tapes</h3>
            <p>Manage tapes</p>
        </a>
        <a href="{{ route('actors.index') }}" class="dash-card">
            <i class="bi bi-people"></i>
            <h3>Actors</h3>
            <p>Manage actors</p>
        </a>
        <a href="{{ route('shelves.index') }}" class="dash-card">
            <i class="bi bi-archive"></i>
            <h3>Shelves</h3>
            <p>Manage shelves</p>
        </a>
        <a href="{{ route('audit-logs') }}" class="dash-card">
            <i class="bi bi-journal-text"></i>
            <h3>Audit Logs</h3>
            <p>View activity</p>
        </a>
        @if(session('role') == 'admin')
        <a href="{{ route('users.index') }}" class="dash-card">
            <i class="bi bi-person-gear"></i>
            <h3>Users</h3>
            <p>Manage users</p>
        </a>
        @endif
    </div>
</div>
@endsection