<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Menyimpan file poster jika ada
        $posterPath = $request->hasFile('poster') ? $request->file('poster')->store('posters', 'public') : null;

        // Menyimpan data film
        try {
            Movie::create([
                'title' => $validatedData['title'],
                'synopsis' => $validatedData['synopsis'],
                'poster' => $posterPath,
                'year' => $validatedData['year'],
                'available' => $validatedData['available'],
                'genre_id' => $validatedData['genre_id'],
            ]);

            return redirect()->route('movies.index')->with('success', 'Data Film Berhasil di Masukkan!');
        } catch (\Exception $e) {
            return redirect()->route('movies.index')->with('error', 'Data Film Tidak Berhasil di Masukkan, Coba Ulang Kembali');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $movie = Movie::findOrFail($id);

        try {
            if ($request->hasFile('poster')) {
                $posterPath = $request->file('poster')->store('posters', 'public');
            } else {
                $posterPath = $movie->poster;
            }

            $movie->update([
                'title' => $validated['title'],
                'synopsis' => $validated['synopsis'],
                'poster' => $posterPath,  
                'year' => $validated['year'],
                'available' => $validated['available'],
                'genre_id' => $validated['genre_id'],
            ]);

            return redirect()->route('movies.index')->with('success', 'Data Film Berhasil di Update!');
        } catch (\Exception $e) {
            return redirect()->route('movies.index')->with('error', 'Data Film Tidak Berhasil di Update, Coba Ulang Kembali');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Data Film Berhasil di Hapus!');
    }
}
