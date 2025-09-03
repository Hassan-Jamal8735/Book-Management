<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Book
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" 
                               value="{{ old('title', $book->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" 
                               value="{{ old('author', $book->author) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" 
                               value="{{ old('price', $book->price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Published Date</label>
                        <input type="date" name="published_date" class="form-control" 
                               value="{{ old('published_date', $book->published_date) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Book Image</label>
                        <input type="file" name="book_image" class="form-control">
                        @if($book->book_image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $book->book_image) }}" width="100">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>Categories</label>
                        <select name="categories[]" multiple class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $book->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
