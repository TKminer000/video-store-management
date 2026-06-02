<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')->orderBy('title')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:150',
            'category' => 'required|string|max:50',
            'director' => 'required|string|max:100',
            'year'     => 'required|integer|min:1900|max:2099',
        ]);

        DB::table('movie')->insert([
            'title'    => $request->title,
            'category' => $request->category,
            'director' => $request->director,
            'year'     => $request->year,
        ]);

        DB::table('audit_logs')->insert([
            'user_id'       => session('user_id'),
            'action'        => 'CREATE',
            'table_affected'=> 'movie',
            'details'       => 'Added movie: ' . $request->title,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added!');
    }

    public function edit($id)
    {
        $movie = DB::table('movie')->where('movie_id', $id)->first();
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|string|max:150',
            'category' => 'required|string|max:50',
            'director' => 'required|string|max:100',
            'year'     => 'required|integer|min:1900|max:2099',
        ]);

        DB::table('movie')->where('movie_id', $id)->update([
            'title'    => $request->title,
            'category' => $request->category,
            'director' => $request->director,
            'year'     => $request->year,
        ]);

        DB::table('audit_logs')->insert([
            'user_id'       => session('user_id'),
            'action'        => 'UPDATE',
            'table_affected'=> 'movie',
            'details'       => 'Updated movie ID: ' . $id,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie updated!');
    }

    public function destroy($id)
    {
        $movie = DB::table('movie')->where('movie_id', $id)->first();

        DB::table('movie')->where('movie_id', $id)->delete();

        DB::table('audit_logs')->insert([
            'user_id'       => session('user_id'),
            'action'        => 'DELETE',
            'table_affected'=> 'movie',
            'details'       => 'Deleted movie: ' . $movie->title,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie deleted!');
    }
}