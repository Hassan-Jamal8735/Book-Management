<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
                <p class="text-gray-400 mt-2 text-lg">Manage your digital library with style</p>
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

        /* Button Styles */
        .btn {
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            font-size: 1rem;
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
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-3px);
        }

        /* Enhanced Stats Cards */
        .stats-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            padding: 2rem;
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
            transform: translateY(-10px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stats-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #007bff, #8a2be2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            background-size: 200% 200%;
            animation: gradient-shift 3s ease infinite;
        }

        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, #007bff, #8a2be2);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stats-label {
            color: #b0b0b0;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Enhanced Quick Action Cards */
        .quick-action-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            padding: 2rem;
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
            transform: translateY(-8px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        /* Enhanced Book Cards */
        .recent-books-card, .welcome-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.1), rgba(138, 43, 226, 0.1));
            border: 1px solid rgba(0, 123, 255, 0.2);
            text-align: center;
        }

        .book-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            transition: all 0.4s ease;
            cursor: pointer;
            padding: 2.5rem;
            margin-bottom: 1rem;
        }

        .book-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .action-link {
            color: #60a5fa;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
        }

        .action-link:hover {
            color: #3b82f6;
            transform: translateX(5px);
        }

        /* Enhanced Categories */
        .category-tag {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.375rem 1rem;
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

        /* Enhanced Action Buttons */
        .action-btn {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
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

        /* Book Actions */
        .book-actions {
            opacity: 0;
            transition: opacity 0.3s ease;
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
        }

        .book-item:hover .book-actions {
            opacity: 1;
        }

        /* Floating Card */
        .floating-card {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(0, 123, 255, 0.3);
            backdrop-filter: blur(20px);
            z-index: 1000;
            transition: all 0.3s ease;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
        }

        .floating-card:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.4);
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
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

        /* Section Titles */
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #ffffff, #b0b0b0);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Enhanced Grid Layout */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .floating-card {
                bottom: 1rem;
                right: 1rem;
                width: 50px;
                height: 50px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .stats-card {
                padding: 1.5rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
        }

        /* Success/Error Alerts */
        .alert {
            position: fixed;
            top: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            font-weight: 500;
            z-index: 1000;
            backdrop-filter: blur(20px);
            animation: slideIn 0.3s ease-out;
        }

        .alert.success {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
        }

        .alert.error {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 space-y-8">

            <!-- Welcome Message -->
            @if(\App\Models\Book::where('user_id', auth()->id())->count() == 0)
                <div class="welcome-card fade-in">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Welcome to Your Library!</h3>
                    <p class="text-gray-400 mb-8 text-lg max-w-2xl mx-auto">Start building your digital book collection today. Create your first book entry to begin organizing your personal library.</p>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        Add Your First Book
                    </a>
                </div>
            @endif

            <!-- Stats Overview -->
            <div class="stats-grid">
                <div class="stats-card fade-in">
                    <div class="stats-icon">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="stats-number">{{ \App\Models\Book::where('user_id', auth()->id())->count() }}</div>
                    <div class="stats-label">Total Books</div>
                </div>
                
                <div class="stats-card fade-in">
                    <div class="stats-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div class="stats-number">{{ \App\Models\Category::withCount(['books' => function($query) { $query->where('user_id', auth()->id()); }])->having('books_count', '>', 0)->count() }}</div>
                    <div class="stats-label">Categories</div>
                </div>
                
                <div class="stats-card fade-in">
                    <div class="stats-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <div class="stats-number">${{ number_format(\App\Models\Book::where('user_id', auth()->id())->sum('price'), 2) }}</div>
                    <div class="stats-label">Total Value</div>
                </div>
                
                <div class="stats-card fade-in">
                    <div class="stats-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                        </svg>
                    </div>
                    <div class="stats-number">{{ \App\Models\Book::where('user_id', auth()->id())->where('created_at', '>=', now()->subMonth())->count() }}</div>
                    <div class="stats-label">Added This Month</div>
                </div>
            </div>

            <div class="content-grid">
                <!-- Quick Actions -->
                <div>
                    <h3 class="section-title">Quick Actions</h3>
                    <div class="space-y-4">
                        <a href="{{ route('books.create') }}" class="quick-action-card block">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Add New Book</h4>
                                    <p class="text-gray-400 text-sm">Expand your collection</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('books.index') }}" class="quick-action-card block">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Browse Library</h4>
                                    <p class="text-gray-400 text-sm">View all your books</p>
                                </div>
                            </div>
                        </a>
                        
                       
                    </div>
                </div>

                <!-- Recent Books -->
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="section-title">Recent Books</h3>
                        <a href="{{ route('books.index') }}" class="action-link">View All</a>
                    </div>
                    <div class="recent-books-card">
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
                                    <div class="book-item relative">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                @if($book->book_image)
                                                    <img src="{{ Storage::url($book->book_image) }}" alt="{{ $book->title }}" class="w-16 h-20 object-cover rounded-lg shadow-lg">
                                                @else
                                                    <div class="w-16 h-20 bg-gradient-to-br from-gray-600 to-gray-700 rounded-lg flex items-center justify-center shadow-lg">
                                                        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-white font-semibold text-lg truncate">{{ $book->title }}</h4>
                                                <p class="text-gray-400">by {{ $book->author }}</p>
                                                <div class="flex items-center space-x-2 mt-3">
                                                    @foreach($book->categories->take(2) as $category)
                                                        <span class="category-tag">
                                                            {{ $category->name }}
                                                        </span>
                                                    @endforeach
                                                    @if($book->categories->count() > 2)
                                                        <span class="text-gray-400 text-sm">+{{ $book->categories->count() - 2 }} more</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-green-400 font-bold text-lg">${{ number_format($book->price, 2) }}</p>
                                                <p class="text-gray-400 text-sm">{{ $book->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="book-actions">
                                            <!-- <a href="{{ route('books.show', $book) }}" class="action-btn">
                                                View
                                            </a> -->
                                            <a href="{{ route('books.edit', $book) }}" class="action-btn">
                                                Edit
                                            </a>
                                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this book?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-16">
                                <svg class="w-20 h-20 mx-auto text-gray-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                                </svg>
                                <h4 class="text-gray-400 text-xl font-semibold mb-3">No books yet</h4>
                                <p class="text-gray-500 mb-6 text-lg">Start building your digital library today</p>
                                <a href="{{ route('books.create') }}" class="btn btn-primary">
                                    Add Your First Book
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <!-- Floating Quick Add Button -->
    <div class="floating-card" title="Quick Add Book">
        <a href="{{ route('books.create') }}" class="block">
            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </a>
    </div>

    <!-- JavaScript for enhanced interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter animation for stats
            const statNumbers = document.querySelectorAll('.stats-number');
            
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const text = target.textContent;
                        const finalNumber = text.replace(/[^\d.]/g, '');
                        const suffix = text.replace(/[\d.]/g, '');
                        
                        if (finalNumber) {
                            animateCounter(target, 0, parseFloat(finalNumber), suffix, 2000);
                            statsObserver.unobserve(target);
                        }
                    }
                });
            });

            statNumbers.forEach(el => statsObserver.observe(el));

            function animateCounter(element, start, end, suffix, duration) {
                const startTime = performance.now();
                
                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = easeOutQuart(progress);
                    
                    const current = start + (end - start) * eased;
                    const display = suffix.includes('.') ? current.toFixed(2) : Math.floor(current);
                    element.textContent = display + suffix;
                    
                    if (progress < 1) {
                        requestAnimationFrame(update);
                    }
                }
                
                requestAnimationFrame(update);
            }

            function easeOutQuart(t) {
                return 1 - (--t) * t * t * t;
            }

            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Add loading state to form submissions
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Loading...';
                        submitBtn.disabled = true;
                    }
                });
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(100%)';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 5000);

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + N for new book
                if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                    e.preventDefault();
                    window.location.href = '{{ route("books.create") }}';
                }
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