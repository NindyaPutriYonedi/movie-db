@extends('layouts.main')
@section('title', 'Edit Movie')
@section('content')

<h1>Edit Data Movie</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            id="title"
            value="{{ old('title', $movie->title) }}"
            required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Slug --}}
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input
            type="text"
            name="slug"
            class="form-control @error('slug') is-invalid @enderror"
            id="slug"
            value="{{ old('slug', $movie->slug) }}"
            required>
        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Synopsis --}}
    <div class="mb-3">
        <label for="synopsis" class="form-label">Synopsis</label>
        <textarea
            name="synopsis"
            id="synopsis"
            rows="4"
            class="form-control @error('synopsis') is-invalid @enderror"
            required>{{ old('synopsis', $movie->synopsis) }}</textarea>
        @error('synopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Category ID (Dropdown) --}}
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select
            name="category_id"
            id="category_id"
            class="form-select @error('category_id') is-invalid @enderror"
            required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Year --}}
    <div class="mb-3">
        <label for="year" class="form-label">Tahun</label>
        <input
            type="text"
            name="year"
            class="form-control @error('year') is-invalid @enderror"
            id="year"
            value="{{ old('year', $movie->year) }}"
            required>
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Actors --}}
    <div class="mb-3">
        <label for="actors" class="form-label">Aktor</label>
        <input
            type="text"
            name="actors"
            class="form-control @error('actors') is-invalid @enderror"
            id="actors"
            value="{{ old('actors', $movie->actors) }}"
            required>
        @error('actors') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Cover Image --}}
    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input
            type="file"
            name="cover_image"
            class="form-control @error('cover_image') is-invalid @enderror"
            id="cover_image">
        @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror

        {{-- Optional: Tampilkan preview image lama --}}
        @if ($movie->cover_image)
            <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="Cover Image" class="mt-2" style="max-height: 150px;">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('movie.index') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
