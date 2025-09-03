<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookVault - Smart Book Management for Modern Readers</title>
    <meta name="description" content="Organize, track, and discover your book collection with BookVault. The ultimate digital library management system for book lovers.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 10, 0.95);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: 
                radial-gradient(circle at 25% 25%, #1a1a2e 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, #16213e 0%, transparent 50%),
                linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(0, 123, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(138, 43, 226, 0.1) 0%, transparent 50%);
            animation: pulse 4s ease-in-out infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .hero-content {
            text-align: center;
            max-width: 1000px;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        .hero-title {
            font-size: clamp(2.5rem, 8vw, 5rem);
            font-weight: 900;
            line-height: 1.1;
             margin-top: 6rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #a0a0a0 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 3vw, 1.5rem);
            color: #b0b0b0;
            margin-bottom: 3rem;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .hero-cta {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Buttons */
        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
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

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: #111111;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
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

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 123, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #007bff, #8a2be2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .feature-description {
            color: #b0b0b0;
            line-height: 1.6;
            font-size: 1.1rem;
        }

        /* Stats Section */
        .stats {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #007bff, #8a2be2);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #b0b0b0;
            font-size: 1.2rem;
            font-weight: 500;
        }

        /* CTA Section */
        .final-cta {
            padding: 6rem 2rem;
            text-align: center;
            background: #0a0a0a;
        }

        .cta-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff, #b0b0b0);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cta-subtitle {
            font-size: 1.3rem;
            color: #b0b0b0;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        .footer {
            padding: 3rem 2rem 2rem;
            background: #111111;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-cta {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Scroll animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating particles */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(0, 123, 255, 0.5);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(odd) {
            background: rgba(138, 43, 226, 0.5);
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0; }
            50% { transform: translateY(-100px) translateX(50px); opacity: 1; }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold">BookVault</span>
            </div>
            
            <div class="flex items-center space-x-6">
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors">Sign In</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started Free</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Floating Particles -->
        <div class="particle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="top: 60%; left: 85%; animation-delay: 2s;"></div>
        <div class="particle" style="top: 30%; left: 70%; animation-delay: 4s;"></div>
        <div class="particle" style="top: 80%; left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="top: 10%; left: 50%; animation-delay: 3s;"></div>

        <div class="hero-content">
            <h1 class="hero-title">
                The Future of<br>Book Management
            </h1>
            <p class="hero-subtitle">
                Transform your reading experience with AI-powered organization, smart categorization, 
                and seamless discovery. Join thousands of readers who've revolutionized their libraries.
            </p>
            <div class="hero-cta">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Start Your Free Library
                </a>
                <a href="#features" class="btn btn-secondary">
                    See How It Works
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold mb-6">Why Choose BookVault?</h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                    Everything you need to organize, track, and discover your perfect reading collection
                </p>
            </div>

            <div class="feature-grid">
                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Smart Organization</h3>
                    <p class="feature-description">
                        Automatically categorize your books by genre, author, reading status, and custom tags. 
                        Our AI learns your preferences to suggest the perfect organization system.
                    </p>
                </div>

                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Lightning Search</h3>
                    <p class="feature-description">
                        Find any book instantly with our powerful search engine. Search by title, author, 
                        genre, or even quotes and notes you've added to your books.
                    </p>
                </div>

                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Reading Analytics</h3>
                    <p class="feature-description">
                        Track your reading progress, set goals, and discover patterns in your reading habits. 
                        Get personalized insights to enhance your literary journey.
                    </p>
                </div>

                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Rich Media Support</h3>
                    <p class="feature-description">
                        Upload book covers, add detailed descriptions, ratings, and personal notes. 
                        Create a visually stunning digital library that's uniquely yours.
                    </p>
                </div>

                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Cross-Platform Sync</h3>
                    <p class="feature-description">
                        Access your library from anywhere, on any device. Your books, notes, and progress 
                        sync seamlessly across all your devices in real-time.
                    </p>
                </div>

                <div class="feature-card scroll-reveal">
                    <div class="feature-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Community Features</h3>
                    <p class="feature-description">
                        Connect with fellow readers, share book recommendations, join reading challenges, 
                        and discover your next favorite book through our community features.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-grid scroll-reveal">
            <div>
                <div class="stat-number">50K+</div>
                <div class="stat-label">Books Managed</div>
            </div>
            <div>
                <div class="stat-number">2,500+</div>
                <div class="stat-label">Happy Readers</div>
            </div>
            <div>
                <div class="stat-number">99.9%</div>
                <div class="stat-label">Uptime</div>
            </div>
            <div>
                <div class="stat-number">4.9★</div>
                <div class="stat-label">User Rating</div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="final-cta">
        <div class="max-w-4xl mx-auto scroll-reveal">
            <h2 class="cta-title">Ready to Transform Your Reading Experience?</h2>
            <p class="cta-subtitle">
                Join thousands of book lovers who have already revolutionized how they manage, 
                discover, and enjoy their personal libraries.
            </p>
            <div class="flex gap-6 justify-center flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Create Your Free Account
                </a>
                <a href="{{ route('login') }}" class="btn btn-secondary">
                    Already Have an Account?
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold">BookVault</span>
            </div>
            <p class="text-gray-400">
                &copy; {{ date('Y') }} BookVault. Crafted By Hassan Jamal.
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Scroll reveal animations
            const revealElements = document.querySelectorAll('.scroll-reveal');
            
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('revealed');
                        }, index * 100);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(el => revealObserver.observe(el));

            // Counter animation for stats
            const statNumbers = document.querySelectorAll('.stat-number');
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const text = target.textContent;
                        const finalNumber = text.replace(/[^\d.]/g, '');
                        const suffix = text.replace(/[\d.]/g, '');
                        
                        animateCounter(target, 0, parseFloat(finalNumber), suffix, 2000);
                        statsObserver.unobserve(target);
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
                    const display = suffix.includes('★') ? current.toFixed(1) : Math.floor(current);
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

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>