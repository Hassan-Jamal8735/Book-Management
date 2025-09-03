<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-white">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
                <p class="text-gray-400 mt-1">Manage your digital library</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('books.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                    Add New Book
                </a>
            </div>
        </div>
    </x-slot>

    <style>
        body {
            background: #0a0a0a;
            color: #ffffff;
        }

        .stats-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
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

        .stats-card:hover::before {
            opacity: 1;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .stats-icon {
            background: linear-gradient(135deg, #007bff, #8a2be2);
            background-size: 200% 200%;
            animation: gradient-shift 3s ease infinite;
        }

        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .stats-number {
            background: linear-gradient(135deg, #007bff, #8a2be2);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .quick-action-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .quick-action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .quick-action-card:hover::before {
            opacity: 1;
        }

        .quick-action-card:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 123, 255, 0.2);
        }

        .recent-books-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .book-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .book-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .action-link {
            color: #60a5fa;
            transition: all 0.3s ease;
        }

        .action-link:hover {
            color: #3b82f6;
            transform: translateX(3px);
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.1), rgba(138, 43, 226, 0.1));
            border: 1px solid rgba(0, 123, 255, 0.2);
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .fade-in:nth-child(1) { animation-delay: 0.1s; }
        .fade-in:nth-child(2) { animation-delay: 0.2s; }
        .fade-in:nth-child(3) { animation-delay: 0.3s; }
        .fade-in:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 space-y-8">

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Total Books -->
                <div class="stats-card rounded-2xl p-6 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Books</p>
                            <p class="stats-number text-3xl font-bold mt-1">{{ \App\Models\Book::where('user_id', auth()->id())->count() }}</p>
                        </div>
                        <div class="stats-icon w-12 h-12 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('books.index') }}" class="action-link text-sm font-medium mt-4 inline-flex items-center">
                        View All Books 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Categories -->
                <div class="stats-card rounded-2xl p-6 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Categories</p>
                            <p class="stats-number text-3xl font-bold mt-1">{{ \App\Models\Category::count() }}</p>
                        </div>
                        <div class="stats-icon w-12 h-12 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('books.index') }}" class="action-link text-sm font-medium mt-4 inline-flex items-center">
                        Browse Categories
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Recent Books -->
                <div class="stats-card rounded-2xl p-6 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Added This Month</p>
                            <p class="stats-number text-3xl font-bold mt-1">{{ \App\Models\Book::where('user_id', auth()->id())->whereMonth('created_at', now()->month)->count() }}</p>
                        </div>
                        <div class="stats-icon w-12 h-12 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('books.create') }}" class="action-link text-sm font-medium mt-4 inline-flex items-center">
                        Add New Book
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- User Profile -->
                <div class="stats-card rounded-2xl p-6 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Account</p>
                            <p class="text-white text-lg font-semibold mt-1">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="stats-icon w-12 h-12 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="action-link text-sm font-medium mt-4 inline-flex items-center">
                        Edit Profile
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <h3 class="text-xl font-bold text-white mb-6">Quick Actions</h3>
                    <div class="space-y-4">
                        
                        <div class="quick-action-card rounded-xl p-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-white font-medium">Add New Book</h4>
                                    <p class="text-gray-400 text-sm">Expand your collection</p>
                                </div>
                                <a href="{{ route('books.create') }}" class="text-blue-400 hover:text-blue-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="quick-action-card rounded-xl p-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-white font-medium">Search Books</h4>
                                    <p class="text-gray-400 text-sm">Find your favorites</p>
                                </div>
                                <a href="{{ route('books.index') }}" class="text-purple-400 hover:text-purple-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="quick-action-card rounded-xl p-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-white font-medium">View Analytics</h4>
                                    <p class="text-gray-400 text-sm">Track your progress</p>
                                </div>
                                <a href="{{ route('books.index') }}" class="text-green-400 hover:text-green-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Recent Books -->
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Recent Books</h3>
                        <a href="{{ route('books.index') }}" class="action-link text-sm font-medium">View All</a>
                    </div>
                    
                    <div class="recent-books-card rounded-xl p-6">
                        @php
                            $recentBooks = \App\Models\Book::where('user_id', auth()->id())
                                ->with('categories')
                                ->latest()
                                ->limit(5)
                                ->get();
                        @endphp

                        @if($recentBooks->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentBooks as $book)
                                    <div class="book-item rounded-lg p-4 flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            @if($book->book_image)
                                                <img src="{{ Storage::url($book->book_image) }}" alt="{{ $book->title }}" class="w-12 h-16 object-cover rounded">
                                            @else
                                                <div class="w-12 h-16 bg-gradient-to-br from-gray-600 to-gray-700 rounded flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-white font-medium truncate">{{ $book->title }}</h4>
                                            <p class="text-gray-400 text-sm">by {{ $book->author }}</p>
                                            <div class="flex items-center space-x-2 mt-1">
                                                @foreach($book->categories->take(2) as $category)
                                                    <span class="inline-block bg-blue-500 bg-opacity-20 text-blue-300 text-xs px-2 py-1 rounded">
                                                        {{ $category->name }}
                                                    </span>
                                                @endforeach
                                                @if($book->categories->count() > 2)
                                                    <span class="text-gray-400 text-xs">+{{ $book->categories->count() - 2 }} more</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-green-400 font-semibold">${{ $book->price }}</p>
                                            <p class="text-gray-400 text-xs">{{ $book->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                                </svg>
                                <h4 class="text-gray-400 text-lg font-medium mb-2">No books yet</h4>
                                <p class="text-gray-500 mb-4">Start building your digital library today</p>
                                <a href="{{ route('books.create') }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                                    Add Your First Book
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>