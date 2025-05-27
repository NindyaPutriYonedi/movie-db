@extends('layouts.main')
@section('title', 'Tambah Data Movie')
@section('navMovie', 'active')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="col-12">
                <h1 class="h2">Input Data Movie</h1>

                <form action="/movie" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Input Title --}}
    <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Input Synopsis --}}
    <div class="mb-3 row">
        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
        <div class="col-sm-10">
            <textarea name="synopsis" id="synopsis" rows="4" class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
            @error('synopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Input Category ID --}}
    <div class="row mb-3">
        <label for="category_id" class="col-sm-2 col-form-label">ID Kategori</label>
        <div class="col-sm-10">
            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
    <option value="">-- Pilih Kategori --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->category_name }}
        </option>
    @endforeach
</select>
@error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Input Year --}}
    <div class="row mb-3">
        <label for="year" class="col-sm-2 col-form-label">Tahun</label>
        <div class="col-sm-10">
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" id="year" value="{{ old('year') }}">
            @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Input Actors --}}
    <div class="row mb-3">
        <label for="actors" class="col-sm-2 col-form-label">Aktor</label>
        <div class="col-sm-10">
            <input type="text" name="actors" class="form-control @error('actors') is-invalid @enderror" id="actors" value="{{ old('actors') }}">
            @error('actors') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Input Cover Image --}}
    <div class="row mb-3">
        <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
        <div class="col-sm-10">
            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image">
            @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

            </div>
        </div>
    </div>
@endsection
