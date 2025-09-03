<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-pulse"></div>
            <div class="absolute top-3/4 right-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-pulse animation-delay-2000"></div>
        </div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Header -->
            <div class="text-center">
                <div class="flex justify-center items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                    Forgot Password?
                </h2>
                <p class="mt-3 text-gray-400 text-lg">
                    We'll help you get back to your books
                </p>
            </div>

            <!-- Explanation Card -->
            <div class="bg-blue-900/20 border border-blue-500/30 rounded-2xl p-6 backdrop-blur-sm">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-blue-300 mb-2">Don't worry, it happens!</h3>
                        <p class="text-blue-200 text-sm leading-relaxed">
                            Enter your email address below and we'll send you a secure password reset link. 
                            Check your inbox (and spam folder) within a few minutes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-green-900/50 border border-green-500/50 text-green-300 px-6 py-4 rounded-2xl backdrop-blur-sm">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold">Email Sent Successfully!</h4>
                            <p class="text-sm mt-1">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Forgot Password Form -->
            <div class="bg-gray-900/50 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-8 shadow-2xl">
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Progress Indicator -->
                    <div class="flex items-center justify-center space-x-3 mb-6">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center animate-pulse">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-blue-400 font-medium">Send recovery email</span>
                        </div>
                        <div class="w-8 border-t-2 border-gray-600"></div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-400">Reset password</span>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-gray-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Email Address
                        </label>
                        <div class="relative">
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                required 
                                autofocus
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 bg-gray-800/70 border border-gray-600/50 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm pr-12"
                                placeholder="Enter your email address"
                            />
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Send Reset Link Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/50"
                    >
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Send Password Reset Link
                        </span>
                    </button>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-600/50"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-gray-900/50 text-gray-400">Or try another option</span>
                        </div>
                    </div>

                    <!-- Alternative Actions -->
                    <div class="grid grid-cols-1 gap-3">
                        <a 
                            href="{{ route('login') }}" 
                            class="flex items-center justify-center px-4 py-3 border border-gray-600/50 rounded-lg text-gray-300 hover:text-white hover:border-gray-500 transition-all duration-200 hover:bg-gray-800/30"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Back to Sign In
                        </a>

                        <a 
                            href="{{ route('register') }}" 
                            class="flex items-center justify-center px-4 py-3 border border-gray-600/50 rounded-lg text-gray-300 hover:text-white hover:border-gray-500 transition-all duration-200 hover:bg-gray-800/30"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Create New Account Instead
                        </a>
                    </div>
                </form>
            </div>

            <!-- Help Section -->
            <div class="bg-gray-800/30 border border-gray-700/50 rounded-2xl p-6">
                <h4 class="text-lg font-semibold text-gray-200 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Need Additional Help?
                </h4>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-blue-500/20 rounded-full flex items-center justify-center mt-0.5">
                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-gray-300">
                                <strong>Check your spam folder</strong> - Sometimes our emails end up there
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-blue-500/20 rounded-full flex items-center justify-center mt-0.5">
                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-gray-300">
                                <strong>Wait a few minutes</strong> - Email delivery can take 2-5 minutes
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-blue-500/20 rounded-full flex items-center justify-center mt-0.5">
                            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                        </div>
                        <div>
                            <p class="text-gray-300">
                                <strong>Try a different email</strong> - Use the email you registered with
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-700/50">
                    <p class="text-gray-400 text-sm text-center">
                        Still having trouble? Contact our support team at 
                        <a href="mailto:support@bookvault.com" class="text-blue-400 hover:text-blue-300 underline">
                            support@bookvault.com
                        </a>
                    </p>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="text-center">
                <div class="flex items-center justify-center text-gray-500 text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.012-3H7.5a2.25 2.25 0 00-2.25 2.25v1.5m16.5-4.5a2.25 2.25 0 00-2.25-2.25h-3.12m-1.677 9.013h.007v.007h-.007v-.007zm0 3.464v.007h.007v-.007h-.007zm.332-7.464h.007v.007h-.007v-.007zm0 3.464h.007v.007h-.007v-.007z"/>
                    </svg>
                    Reset links expire in 60 minutes for your security
                </div>
            </div>
        </div>
    </div>

    <style>
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        /* Custom focus styles */
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        /* Enhanced backdrop blur support */
        .backdrop-blur-xl {
            backdrop-filter: blur(24px);
        }
        
        /* Smooth transitions */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Email validation styles */
        input:valid {
            border-color: rgba(34, 197, 94, 0.3);
        }
        
        input:invalid:not(:placeholder-shown) {
            border-color: rgba(239, 68, 68, 0.3);
        }
        
        /* Loading state for form submission */
        .form-loading {
            opacity: 0.7;
            pointer-events: none;
        }
        
        .form-loading button {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const emailInput = document.getElementById('email');
            const submitButton = form.querySelector('button[type="submit"]');

            // Form entrance animation
            form.style.opacity = '0';
            form.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                form.style.transition = 'all 0.6s ease-out';
                form.style.opacity = '1';
                form.style.transform = 'translateY(0)';
            }, 100);

            // Email validation with visual feedback
            emailInput.addEventListener('input', function() {
                const emailIcon = emailInput.nextElementSibling.querySelector('svg');
                
                if (this.validity.valid && this.value.length > 0) {
                    emailIcon.className = 'w-5 h-5 text-green-400';
                    emailIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    `;
                } else if (this.value.length > 0) {
                    emailIcon.className = 'w-5 h-5 text-red-400';
                    emailIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    `;
                } else {
                    emailIcon.className = 'w-5 h-5 text-gray-400';
                    emailIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    `;
                }
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                if (!emailInput.validity.valid) {
                    e.preventDefault();
                    emailInput.focus();
                    return;
                }

                form.classList.add('form-loading');
                const originalText = submitButton.innerHTML;
                
                submitButton.innerHTML = `
                    <span class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sending Reset Link...
                    </span>
                `;
                submitButton.disabled = true;
            });

            // Auto-hide success message after delay
            const successMessage = document.querySelector('.bg-green-900\\/50');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'all 0.5s ease-out';
                    successMessage.style.opacity = '0';
                    successMessage.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 500);
                }, 10000); // Hide after 10 seconds
            }
        });
    </script>
</x-guest-layout>