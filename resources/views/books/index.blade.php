<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Books
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Filter Form -->
                <form method="GET" action="{{ route('books.index') }}" class="mb-3">
                    <select name="category" class="form-control" onchange="this.form.submit()">
                        <option value="">-- Filter by Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <!-- Add Book Button -->
                <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add Book</a>

                <!-- Books Table -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>Published</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                @foreach($book->categories as $cat)
                                    <span class="badge bg-info">{{ $cat->name }}</span>
                                @endforeach
                            </td>
                            <td>${{ $book->price }}</td>
                            <td>{{ $book->published_date }}</td>
                            <td>
                                @if($book->book_image)
                                    <img src="{{ asset('storage/' . $book->book_image) }}" width="60">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" 
                                   class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" 
                                      action="{{ route('books.destroy', $book->id) }}" 
                                      style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this book?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No books found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
