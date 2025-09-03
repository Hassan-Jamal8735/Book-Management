<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white">
                    Your Library
                </h2>
                <p class="text-gray-400 mt-2 text-lg">Explore and manage your book collection</p>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('books.create') }}" class="btn btn-primary">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Book
                </a>
            </div>
        </div>
    </x-slot>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Enhanced Filter Bar */
        .filter-bar {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(20px);
            margin-bottom: 2rem;
        }

        .filter-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            width: 100%;
            max-width: 300px;
        }

        .filter-select:focus {
            outline: none;
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-select option {
            background: #1a1a1a;
            color: white;
            padding: 0.5rem;
        }

        /* Search Bar */
        .search-container {
            position: relative;
            flex: 1;
            max-width: 400px;
            margin-right: 1rem;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 0.875rem 1.25rem 0.875rem 3rem;
            color: white;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        /* View Toggle */
        .view-toggle {
            display: flex;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .view-toggle button {
            padding: 0.75rem 1rem;
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .view-toggle button.active {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .view-toggle button:hover:not(.active) {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        /* Stats Bar */
        .stats-bar {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .stat-item {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            text-align: center;
            min-width: 120px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, #007bff, #8a2be2);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #b0b0b0;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Button Styles */
        .btn {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Card Grid View */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .book-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
            cursor: pointer;
        }

        .book-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), rgba(138, 43, 226, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .book-card:hover::before {
            opacity: 1;
        }

        .book-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .book-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .book-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .book-card:hover .book-image {
            transform: scale(1.05);
        }

        .book-placeholder {
            background: linear-gradient(135deg, #374151, #1f2937);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .book-content {
            padding: 2rem;
            position: relative;
        }

        .book-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .book-author {
            color: #9ca3af;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .book-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .category-tag {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .category-tag:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #dbeafe;
            transform: scale(1.05);
        }

        .book-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .book-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #10b981;
        }

        .book-date {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .book-actions {
            display: flex;
            gap: 0.75rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .book-card:hover .book-actions {
            opacity: 1;
        }

        .action-btn {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            flex: 1;
            text-align: center;
        }

        .action-btn:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #dbeafe;
            transform: scale(1.05);
        }

        .action-btn.danger {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.3);
        }

        .action-btn.danger:hover {
            background: rgba(239, 68, 68, 0.3);
            color: #fee2e2;
        }

        /* Table View */
        .books-table {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(20px);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            text-align: left;
            font-weight: 600;
            color: #e5e7eb;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table td {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }

        .table tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .table-image {
            width: 60px;
            height: 75px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            color: #374151;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #9ca3af;
            margin-bottom: 1rem;
        }

        .empty-description {
            font-size: 1rem;
            margin-bottom: 2rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .fade-in:nth-child(odd) { animation-delay: 0.1s; }
        .fade-in:nth-child(even) { animation-delay: 0.2s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .filter-bar {
                padding: 1.5rem;
            }

            .stats-bar {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .stat-item {
                flex: 1;
                min-width: 100px;
                padding: 1rem;
            }

            .books-grid {
                grid-template-columns: 1fr;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table th,
            .table td {
                padding: 1rem;
                font-size: 0.875rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Filter Bar -->
            <div class="filter-bar fade-in">
                <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
                    <div class="flex flex-col sm:flex-row gap-4 flex-1">
                        <!-- Search -->
                        <!-- <div class="search-container">
                            <svg class="search-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" id="searchInput" class="search-input" placeholder="Search books...">
                        </div> -->

                        <!-- Category Filter -->
                        <form method="GET" action="{{ route('books.index') }}" id="filterForm">
                            <select name="category" class="filter-select" onchange="this.form.submit()">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <!-- View Toggle -->
                    <div class="view-toggle">
                        <button type="button" id="gridViewBtn" class="active">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Grid
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="stats-bar fade-in">
                <div class="stat-item">
                    <div class="stat-number">{{ $books->total() }}</div>
                    <div class="stat-label">Total Books</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">${{ number_format($books->sum('price'), 2) }}</div>
                    <div class="stat-label">Total Value</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $categories->count() }}</div>
                    <div class="stat-label">Categories</div>
                </div>
                @if(request('category'))
                    <div class="stat-item">
                        <div class="stat-number">{{ $books->where('categories.id', request('category'))->count() }}</div>
                        <div class="stat-label">Filtered</div>
                    </div>
                @endif
            </div>

            <!-- Books Content -->
            <div id="booksContainer">
                @if($books->count() > 0)
                    <!-- Grid View -->
                    <div id="gridView" class="books-grid">
                        @foreach($books as $book)
                            <div class="book-card fade-in" data-title="{{ strtolower($book->title) }}" data-author="{{ strtolower($book->author) }}">
                                <div class="book-image-container">
                                    @if($book->book_image)
                                        <img src="{{ Storage::url($book->book_image) }}" alt="{{ $book->title }}" class="book-image">
                                    @else
                                        <div class="book-placeholder">
                                            <svg class="w-16 h-16 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="book-content">
                                    <h3 class="book-title">{{ $book->title }}</h3>
                                    <p class="book-author">by {{ $book->author }}</p>

                                    <div class="book-categories">
                                        @foreach($book->categories as $category)
                                            <span class="category-tag">{{ $category->name }}</span>
                                        @endforeach
                                    </div>

                                    <div class="book-meta">
                                        <span class="book-price">${{ number_format($book->price, 2) }}</span>
                                        <span class="book-date">{{ \Carbon\Carbon::parse($book->published_date)->format('M Y') }}</span>
                                    </div>

                                    <div class="book-actions">
                                        <!-- <a href="{{ route('books.show', $book) }}" class="action-btn">View</a> -->
                                        <a href="{{ route('books.edit', $book) }}" class="action-btn">Edit</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Table View (Initially Hidden) -->
                    <div id="listView" class="books-table" style="display: none;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Categories</th>
                                        <th>Price</th>
                                        <th>Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        <tr data-title="{{ strtolower($book->title) }}" data-author="{{ strtolower($book->author) }}">
                                            <td>
                                                @if($book->book_image)
                                                    <img src="{{ Storage::url($book->book_image) }}" alt="{{ $book->title }}" class="table-image">
                                                @else
                                                    <div class="w-15 h-19 bg-gradient-to-br from-gray-600 to-gray-700 rounded-lg flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="font-semibold text-white">{{ $book->title }}</td>
                                            <td class="text-gray-300">{{ $book->author }}</td>
                                            <td>
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach($book->categories as $category)
                                                        <span class="category-tag">{{ $category->name }}</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="text-green-400 font-bold">${{ number_format($book->price, 2) }}</td>
                                            <td class="text-gray-400">{{ \Carbon\Carbon::parse($book->published_date)->format('M d, Y') }}</td>
                                            <td>
                                                <div class="flex gap-2">
                                                    <a href="{{ route('books.show', $book) }}" class="action-btn">View</a>
                                                    <a href="{{ route('books.edit', $book) }}" class="action-btn">Edit</a>
                                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    @if(method_exists($books, 'links'))
                        <div class="mt-8 flex justify-center">
                            {{ $books->links() }}
                        </div>
                    @endif

                @else
                    <!-- Empty State -->
                    <div class="empty-state fade-in">
                        <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                        </svg>
                        <h3 class="empty-title">
                            @if(request('category'))
                                No books found in this category
                            @else
                                No books in your library yet
                            @endif
                        </h3>
                        <p class="empty-description">
                            @if(request('category'))
                                Try browsing other categories or add a book to this category.
                            @else
                                Start building your digital library by adding your first book.
                            @endif
                        </p>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add Your First Book
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // View Toggle Functionality
            const gridViewBtn = document.getElementById('gridViewBtn');
            const listViewBtn = document.getElementById('listViewBtn');
            const gridView = document.getElementById('gridView');
            const listView = document.getElementById('listView');

            gridViewBtn.addEventListener('click', function() {
                gridViewBtn.classList.add('active');
                listViewBtn.classList.remove('active');
                gridView.style.display = 'grid';
                listView.style.display = 'none';
                localStorage.setItem('preferredView', 'grid');
            });

            listViewBtn.addEventListener('click', function() {
                listViewBtn.classList.add('active');
                gridViewBtn.classList.remove('active');
                listView.style.display = 'block';
                gridView.style.display = 'none';
                localStorage.setItem('preferredView', 'list');
            });

            // Load preferred view from localStorage
            const preferredView = localStorage.getItem('preferredView') || 'grid';
            if (preferredView === 'list') {
                listViewBtn.click();
            }

            // Search Functionality
            const searchInput = document.getElementById('searchInput');
            let searchTimeout;

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        const searchTerm = this.value.toLowerCase().trim();
                        console.log('Searching for:', searchTerm);
                        filterBooks(searchTerm);
                    }, 300);
                });
            } else {
                console.error('Search input not found');
            }

            function filterBooks(searchTerm) {
                const gridBooks = document.querySelectorAll('#gridView .book-card');
                const listBooks = document.querySelectorAll('#listView tbody tr');
                
                gridBooks.forEach(book => {
                    const title = book.dataset.title;
                    const author = book.dataset.author;
                    const matches = title.includes(searchTerm) || author.includes(searchTerm);
                    
                    if (matches) {
                        book.style.display = 'block';
                        book.classList.add('fade-in');
                    } else {
                        book.style.display = 'none';
                        book.classList.remove('fade-in');
                    }
                });

                listBooks.forEach(book => {
                    const title = book.dataset.title;
                    const author = book.dataset.author;
                    const matches = title.includes(searchTerm) || author.includes(searchTerm);
                    
                    book.style.display = matches ? 'table-row' : 'none';
                });

                // Show/hide empty state
                updateEmptyState(searchTerm);
            }

            function updateEmptyState(searchTerm) {
                const visibleGridBooks = document.querySelectorAll('#gridView .book-card[style*="block"], #gridView .book-card:not([style*="none"])').length;
                const visibleListBooks = document.querySelectorAll('#listView tbody tr[style*="table-row"], #listView tbody tr:not([style*="none"])').length;
                
                if (searchTerm && (visibleGridBooks === 0 || visibleListBooks === 0)) {
                    showSearchEmptyState(searchTerm);
                } else {
                    hideSearchEmptyState();
                }
            }

            function showSearchEmptyState(searchTerm) {
                const existingEmptyState = document.querySelector('.search-empty-state');
                if (existingEmptyState) return;

                const emptyState = document.createElement('div');
                emptyState.className = 'search-empty-state empty-state fade-in';
                emptyState.innerHTML = `
                    <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <h3 class="empty-title">No books found</h3>
                    <p class="empty-description">No books match your search for "${searchTerm}". Try different keywords.</p>
                    <button onclick="document.getElementById('searchInput').value = ''; document.getElementById('searchInput').dispatchEvent(new Event('input'));" class="btn btn-secondary">
                        Clear Search
                    </button>
                `;
                
                const container = document.getElementById('booksContainer');
                container.appendChild(emptyState);
            }

            function hideSearchEmptyState() {
                const emptyState = document.querySelector('.search-empty-state');
                if (emptyState) {
                    emptyState.remove();
                }
            }

            // Form Loading States
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn && !submitBtn.innerHTML.includes('confirm')) {
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = '<div class="loading"></div>';
                        submitBtn.disabled = true;
                        
                        // Re-enable after 3 seconds as fallback
                        setTimeout(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        }, 3000);
                    }
                });
            });

            // Card Hover Effects Enhancement
            const bookCards = document.querySelectorAll('.book-card');
            bookCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(-10px) scale(1)';
                });
            });

            // Keyboard Shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + F for search
                if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                    e.preventDefault();
                    searchInput.focus();
                }
                
                // Ctrl/Cmd + N for new book
                if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                    e.preventDefault();
                    window.location.href = '{{ route("books.create") }}';
                }
                
                // Ctrl/Cmd + G for grid view
                if ((e.ctrlKey || e.metaKey) && e.key === 'g') {
                    e.preventDefault();
                    gridViewBtn.click();
                }
                
                // Ctrl/Cmd + L for list view
                if ((e.ctrlKey || e.metaKey) && e.key === 'l') {
                    e.preventDefault();
                    listViewBtn.click();
                }
            });

            // Smooth Animations on Load
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all book cards for animation
            document.querySelectorAll('.book-card, .stat-item').forEach(el => {
                observer.observe(el);
            });

            // Auto-focus search on page load (optional)
            setTimeout(() => {
                if (window.innerWidth > 768) { // Only on desktop
                    searchInput.focus();
                }
            }, 500);

            // Enhanced Category Filter with Loading State
            const categorySelect = document.querySelector('select[name="category"]');
            if (categorySelect) {
                categorySelect.addEventListener('change', function() {
                    // Add loading state to the select
                    const originalHTML = this.innerHTML;
                    this.style.opacity = '0.7';
                    this.disabled = true;
                    
                    // Create loading indicator
                    const loadingDiv = document.createElement('div');
                    loadingDiv.className = 'loading-overlay';
                    loadingDiv.style.cssText = `
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        z-index: 1000;
                    `;
                    loadingDiv.innerHTML = '<div class="loading"></div>';
                    
                    this.parentNode.style.position = 'relative';
                    this.parentNode.appendChild(loadingDiv);
                });
            }

            // Price Range Display Enhancement
            const priceElements = document.querySelectorAll('.book-price, .stat-number');
            priceElements.forEach(el => {
                if (el.textContent.includes(')) {
                    el.addEventListener('mouseenter', function() {
                        this.style.transform = 'scale(1.1)';
                        this.style.textShadow = '0 0 10px rgba(16, 185, 129, 0.5)';
                    });
                    
                    el.addEventListener('mouseleave', function() {
                        this.style.transform = 'scale(1)';
                        this.style.textShadow = 'none';
                    });
                }
            });

            // Toast Notifications for Actions
            function showToast(message, type = 'success') {
                const toast = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.style.cssText = `
                    position: fixed;
                    top: 2rem;
                    right: 2rem;
                    background: ${type === 'success' ? 'rgba(34, 197, 94, 0.2)' : 'rgba(239, 68, 68, 0.2)'};
                    border: 1px solid ${type === 'success' ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)'};
                    color: ${type === 'success' ? '#86efac' : '#fca5a5'};
                    padding: 1rem 1.5rem;
                    border-radius: 12px;
                    font-weight: 500;
                    z-index: 1000;
                    backdrop-filter: blur(20px);
                    animation: slideIn 0.3s ease-out;
                    max-width: 300px;
                `;
                toast.textContent = message;
                
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateX(100%)';
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }

            // Enhanced Delete Confirmation
            const deleteButtons = document.querySelectorAll('button.danger, .action-btn.danger');
            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const bookTitle = this.closest('.book-card, tr').querySelector('.book-title, .font-semibold')?.textContent || 'this book';
                    
                    if (confirm(`Are you sure you want to delete "${bookTitle}"? This action cannot be undone.`)) {
                        const form = this.closest('form');
                        if (form) {
                            form.submit();
                            showToast('Book deleted successfully', 'success');
                        }
                    }
                });
            });
        });
    </script>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert success">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert error">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        </div>
    @endif

</x-app-layout>