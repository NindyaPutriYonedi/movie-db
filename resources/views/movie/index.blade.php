@extends('layouts.main')

@section('title', 'Daftar Movie')
@section('navMovie', 'active')

@section('content')
    <h1 class="mb-4">Daftar Movie</h1>

    <a href="{{ route('movie.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Input Data Movie
    </a>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }
            }, 2000); // alert hilang setelah 2 detik
        </script>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col" style="width:5%;">No</th>
                    <th scope="col" style="width:20%;">Title</th>
                    <th scope="col" style="width:8%;">Year</th>
                    <th scope="col" style="width:20%;">Actors</th>
                    <th scope="col" style="width:15%;">Category</th> <!-- Kolom baru untuk kategori -->
                    <th scope="col">Synopsis</th>
                    <th scope="col" style="width:15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movies->firstItem() + $loop->index }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->actors }}</td>
                        <td>{{ $movie->category->category_name ?? 'Tidak ada kategori' }}</td> <!-- Tampilkan nama kategori -->
                        <td>{{ Str::limit($movie->synopsis, 60) }}</td>
                        <td>
                            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                @can('delete')
                                <button class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div>
        {{ $movies->links() }}
    </div>
@endsection
