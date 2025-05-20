@extends('layouts.main')

@section('content')

    <h1>Detail Movie</h1>
    <div class="col-lg-12">
        <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">Synopsis</p>
        <p class="card-text">{{ $movie->year }}</p>
        <p class="card-text">Year : {{ $movie->year }}</p>
        <p class="card-text">Category : {{ $movie->category->category_name }}</p>
        <p class="card-text">Actors : {{ $movie->actors }}</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        {{-- <a href="/{{ $movie->id }}/{{ $movie->slug}}" class="btn btn-success">Back</a> --}}
        <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>

      </div>
    </div>
  </div>
</div>
    </div>
@endsection
