@extends('Layouts.index')

@section('content')
<section class="container my-24 mx-auto">
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-blue-50 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 p-5">
        @csrf

        <!-- Form Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100 mb-10">Tambah Data Film</h1>

        <!-- Title -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="title"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Movie Title</label>
            @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Year -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="year" id="year" value="{{ old('year') }}" min="1900" max="{{ now()->year }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="year"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Release Year</label>
            @error('year')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Genre -->
        <div class="relative z-0 w-full mb-5 group">
            <select name="genre_id" id="genre_id"
                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required>
                <option value="" disabled {{ old('genre_id') ? '' : 'selected' }}>Select Genre</option>
                @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}
                    class="text-black">
                    {{ $genre->name }}
                </option>
                @endforeach
            </select>
            <label for="genre_id"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Genre</label>
            @error('genre_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Synopsis -->
        <div class="relative z-0 w-full mb-5 group">
            <textarea name="synopsis" id="synopsis" rows="4"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required>{{ old('synopsis') }}</textarea>
            <label for="synopsis"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Synopsis</label>
            @error('synopsis')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Poster -->
        <div class="flex flex-col items-center justify-center w-full mb-5">
            <!-- File Input -->
            <label for="poster"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6 relative">
                    <div id="image-preview-container" class="mb-4 hidden w-full h-full bg-red-200 absolute z-50">
                        <img id="image-preview" class=" h-full w-full object-cover rounded-md" alt="Image Preview" />
                    </div>
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag
                        and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, or GIF (MAX. 2MB)</p>
                </div>
                <input id="poster" name="poster" type="file" class="hidden" accept="image/*" />
            </label>
        </div>
        @error('poster')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <!-- Available -->
        <div class="relative z-0 w-full mb-5 group">
            <label for="available" class="text-sm text-gray-500 dark:text-gray-400">Available</label>
            <div class="flex items-center space-x-4 mt-2">
                <label for="yes" class="flex items-center">
                    <input type="radio" name="available" id="yes" value="1" class="text-blue-600"
                        {{ old('available', 1) == 1 ? 'checked' : '' }}>
                    <span class="ml-2 text-white dark:text-white">Yes</span>
                </label>
                <label for="no" class="flex items-center">
                    <input type="radio" name="available" id="no" value="0" class="text-blue-600"
                        {{ old('available', 1) == 0 ? 'checked' : '' }}>
                    <span class="ml-2 text-white dark:text-white">No</span>
                </label>
            </div>
            @error('available')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Movie
        </button>
    </form>
</section>
@endsection


<!-- Script Upload Gambar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('poster').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
                previewImage.src = '';
            }
        });
    });
</script>