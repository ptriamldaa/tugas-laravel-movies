@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <!-- Pesan Sukses -->
    @if(session('success'))
    <div id="alert-3"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mx-20" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <!-- Pesan Error -->
    @if(session('error'))
    <div id="alert-4"
        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 mx-20" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Error</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-4" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <!-- Judul -->
    <div class="flex justify-between px-20">
        <div class="py-4 md:py-8 flex items-center">
            <h1 class="text-2xl font-bold text-gray-800">Rekomendasi Data Film</h1>
        </div>

        <div class="py-4 md:py-8">
            <a href="{{ route('movies.create') }}"
                class="text-white hover:text-white border border-blue-600 bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">
                Create Movie
            </a>
        </div>
    </div>

    <!-- Card -->
    <div id="movie-grid" class="grid grid-cols-1 md:grid-cols-4 gap-6 px-20">
        @forelse ($movies as $movie)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <!-- Poster -->
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="movie-poster">
                <!-- Genre -->
                <div class="absolute top-0 left-0 bg-blue-500 text-white px-3 py-1 text-sm font-semibold">
                    {{ $movie->genre->name ?? 'Unknown' }}
                </div>
            </div>
            <div class="p-4">
                <!-- Title -->
                <h3 class="text-lg font-bold text-gray-800 mb-2">
                    {{ Str::limit($movie->title, 20, '...') }}
                </h3>
                <!-- Year -->
                <p class="text-sm text-gray-500 mb-2">Year: {{ $movie->year }}</p>
                <!-- Synopsis -->
                <p class="text-sm text-gray-700 line-clamp-3 break-words">
                    {{ $movie->synopsis }}
                </p>
                <div class="flex items-center justify-between mt-4">
                    <!-- Available -->
                    <div class="flex items-center">
                        <p class="text-sm {{ $movie->available ? 'text-green-600' : 'text-red-600' }} mb-0 leading-tight transform -translate-y-2.5">
                            {{ $movie->available ? 'Available' : 'Not Available' }}
                        </p>
                    </div>
                    <div class="flex gap-x-2">
                        <!-- Button Edit Data -->
                        <form action="{{ route('movies.edit', $movie->id) }}" method="GET" class="inline-flex">
                            <button
                                class="px-4 py-2 text-yellow-500 hover:text-white border border-yellow-500 hover:bg-yellow-600 rounded-lg text-sm leading-none">
                                Edit
                            </button>
                        </form>
                        <!-- Button Hapus Data -->
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda Ingin Menghapus Film Ini?')"
                                class="px-4 py-2 text-red-500 hover:text-white border border-red-500 hover:bg-red-600 rounded-lg text-sm leading-none">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center text-gray-500">
            <p>No movies found</p>
        </div>
        @endforelse
    </div>
</section>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menutup alert sukses
        const successAlert = document.getElementById("alert-3");
        const successCloseButton = successAlert.querySelector('[data-dismiss-target="#alert-3"]');
        if (successCloseButton) {
            successCloseButton.addEventListener('click', function() {
                successAlert.style.display = 'none';
            });
        }

        // Menutup alert error
        const errorAlert = document.getElementById("alert-4");
        const errorCloseButton = errorAlert.querySelector('[data-dismiss-target="#alert-4"]');
        if (errorCloseButton) {
            errorCloseButton.addEventListener('click', function() {
                errorAlert.style.display = 'none';
            });
        }
    });
</script>