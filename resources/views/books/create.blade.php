@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Book</h1>
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Published Date</label>
            <input type="date" name="published_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Book Image</label>
            <input type="file" name="book_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Categories</label>
            <select name="categories[]" multiple class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

