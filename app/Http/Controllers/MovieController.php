<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(4);

        return view('movie.index', ['movies' => $movies]);
         //compact('movies') untuk menyingkat array  ['movies' => $movies]
        // $movies = Movie::with('category')->latest()->paginate(25);
    }

    public function detail($id, $slug){
        $movie = Movie::find($id);

        return view('layouts.detailmovie', compact('movie'));
    }

    public function homepage()
    {
        $movies = Movie::latest()->paginate(25);

        return view('layouts.home', ['movies' => $movies]);
         //compact('movies') untuk menyingkat array  ['movies' => $movies]
        // $movies = Movie::with('category')->latest()->paginate(25);
    }

    public function create()
    {
        $categories = Category::all();
    return view('movie.create', compact('categories'));
        // return view('movie.create');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'synopsis' => 'nullable|string',
        'year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
        'actors' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Generate slug otomatis dari title
    $validated['slug'] = Str::slug($validated['title']);

    // Simpan gambar jika ada
    if ($request->hasFile('cover_image')) {
        $validated['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
    }

    Movie::create($validated);

    return redirect('/movie')->with('success', 'Data Movie berhasil ditambahkan!');
}


    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
         $categories = Category::all();
        return view('movie.edit', compact('movie','categories'));
    }

    public function update(Request $request, Movie $movie): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'synopsis' => 'nullable|string',
            'year' => 'required|integer|min:1800|max:' . (date('Y') + 1),
            'actors' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        $movie->update($validated);

        return redirect('/movie')->with('success', 'Data Movie berhasil diupdate!');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
         if (Gate::allows('delete'))
        {
            echo "Delete movie $movie";
        }
        else{
            abort(403);
        }
        return redirect('/movie')->with('success', 'Data Movie berhasil dihapus!');
    }

    public function createMovie()
    {
        $categories = Category::all();
        return view('create-movie', compact('categories'));
    }

    public function delete($id)
    {
        // if (Gate::allows('delete'))
        // {
        //     echo "Delete movie $id";
        // }
        // else{
        //     abort(403);
        // }
    }
}
