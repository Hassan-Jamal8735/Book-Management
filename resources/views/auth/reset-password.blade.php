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
                    Reset Password
                </h2>
                <p class="mt-3 text-gray-400 text-lg">
                    Create a new secure password for your account
                </p>
            </div>

            <!-- Progress Indicator -->
            <div class="flex items-center justify-center space-x-3 mb-8">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="ml-2 text-sm text-gray-400">Email verified</span>
                </div>
                <div class="w-8 border-t-2 border-gray-600"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center animate-pulse">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <span class="ml-2 text-sm text-blue-400 font-medium">Reset password</span>
                </div>
            </div>

            <!-- Reset Password Form -->
            <div class="bg-gray-900/50 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-8 shadow-2xl">
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address (Read Only) -->
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
                                autocomplete="username" 
                                required 
                                autofocus
                                readonly
                                value="{{ old('email', $request->email) }}"
                                class="w-full px-4 py-3 bg-gray-800/40 border border-gray-600/50 rounded-lg text-gray-300 cursor-not-allowed transition-all duration-300 backdrop-blur-sm"
                            />
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
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

                    <!-- New Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-gray-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            New Password
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                autocomplete="new-password" 
                                required
                                class="w-full px-4 py-3 bg-gray-800/70 border border-gray-600/50 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm pr-12"
                                placeholder="Create a strong password"
                            />
                            <button 
                                type="button" 
                                onclick="togglePassword('password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Password Strength Indicator -->
                        <div class="space-y-2">
                            <div class="flex space-x-1">
                                <div class="h-1 flex-1 bg-gray-700 rounded password-strength" data-strength="0"></div>
                                <div class="h-1 flex-1 bg-gray-700 rounded password-strength" data-strength="1"></div>
                                <div class="h-1 flex-1 bg-gray-700 rounded password-strength" data-strength="2"></div>
                                <div class="h-1 flex-1 bg-gray-700 rounded password-strength" data-strength="3"></div>
                            </div>
                            <p class="text-xs text-gray-400" id="password-strength-text">Password strength will appear here</p>
                        </div>
                        
                        @error('password')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-300 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <input 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                autocomplete="new-password" 
                                required
                                class="w-full px-4 py-3 bg-gray-800/70 border border-gray-600/50 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm pr-12"
                                placeholder="Confirm your new password"
                            />
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white transition-colors"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        <div id="password-match-indicator" class="text-sm hidden">
                            <span class="text-green-400 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Passwords match
                            </span>
                        </div>
                        @error('password_confirmation')
                            <p class="text-red-400 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Requirements -->
                    <div class="bg-gray-800/30 border border-gray-700/50 rounded-lg p-4">
                        <h4 class="text-sm font-medium text-gray-300 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Password Requirements
                        </h4>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-center text-gray-400" id="req-length">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                At least 8 characters long
                            </li>
                            <li class="flex items-center text-gray-400" id="req-uppercase">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Contains uppercase letter
                            </li>
                            <li class="flex items-center text-gray-400" id="req-lowercase">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Contains lowercase letter
                            </li>
                            <li class="flex items-center text-gray-400" id="req-number">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Contains a number
                            </li>
                        </ul>
                    </div>

                    <!-- Reset Button -->
                    <button 
                        type="submit" 
                        id="submit-btn"
                        disabled
                        class="w-full bg-gray-600 text-gray-400 font-semibold py-3 px-6 rounded-lg shadow-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500/50 disabled:cursor-not-allowed"
                    >
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Reset Password
                        </span>
                    </button>
                </form>
            </div>

            <!-- Security Notice -->
            <div class="text-center">
                <div class="flex items-center justify-center text-gray-500 text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.012-3H7.5a2.25 2.25 0 00-2.25 2.25v1.5m16.5-4.5a2.25 2.25 0 00-2.25-2.25h-3.12m-1.677 9.013h.007v.007h-.007v-.007zm0 3.464v.007h.007v-.007h-.007zm.332-7.464h.007v.007h-.007v-.007zm0 3.464h.007v.007h-.007v-.007z"/>
                    </svg>
                    Your password will be encrypted and securely stored
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
        
        /* Password strength colors */
        .strength-weak { background: #ef4444; }
        .strength-fair { background: #f97316; }
        .strength-good { background: #eab308; }
        .strength-strong { background: #22c55e; }
        
        /* Button enabled state */
        .btn-enabled {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6) !important;
            color: white !important;
            cursor: pointer !important;
            transform: none !important;
        }
        
        .btn-enabled:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
        }
        
        /* Smooth transitions */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                    </svg>
                `;
            } else {
                field.type = 'password';
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            const confirmField = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submit-btn');
            const strengthBars = document.querySelectorAll('.password-strength');
            const strengthText = document.getElementById('password-strength-text');
            const matchIndicator = document.getElementById('password-match-indicator');

            function updateRequirement(id, met) {
                const element = document.getElementById(id);
                if (met) {
                    element.className = 'flex items-center text-green-400';
                    element.querySelector('svg').innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    `;
                } else {
                    element.className = 'flex items-center text-gray-400';
                    element.querySelector('svg').innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    `;
                }
            }

            function checkPasswordStrength(password) {
                let strength = 0;
                let feedback = [];

                // Length check
                if (password.length >= 8) {
                    strength++;
                    updateRequirement('req-length', true);
                } else {
                    updateRequirement('req-length', false);
                    feedback.push('Use at least 8 characters');
                }

                // Uppercase check
                if (/[A-Z]/.test(password)) {
                    strength++;
                    updateRequirement('req-uppercase', true);
                } else {
                    updateRequirement('req-uppercase', false);
                    feedback.push('Add uppercase letter');
                }

                // Lowercase check
                if (/[a-z]/.test(password)) {
                    strength++;
                    updateRequirement('req-lowercase', true);
                } else {
                    updateRequirement('req-lowercase', false);
                    feedback.push('Add lowercase letter');
                }

                // Number check
                if (/\d/.test(password)) {
                    strength++;
                    updateRequirement('req-number', true);
                } else {
                    updateRequirement('req-number', false);
                    feedback.push('Add a number');
                }

                // Update strength bars
                strengthBars.forEach((bar, index) => {
                    bar.className = 'h-1 flex-1 rounded password-strength';
                    if (index < strength) {
                        if (strength === 1) bar.classList.add('strength-weak');
                        else if (strength === 2) bar.classList.add('strength-fair');
                        else if (strength === 3) bar.classList.add('strength-good');
                        else if (strength === 4) bar.classList.add('strength-strong');
                    } else {
                        bar.classList.add('bg-gray-700');
                    }
                });

                // Update strength text
                const strengthLevels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
                const strengthColors = ['text-red-400', 'text-orange-400', 'text-yellow-400', 'text-green-400', 'text-green-400'];
                
                if (password.length > 0) {
                    strengthText.textContent = `Password strength: ${strengthLevels[strength]}`;
                    strengthText.className = `text-xs ${strengthColors[strength]}`;
                } else {
                    strengthText.textContent = 'Password strength will appear here';
                    strengthText.className = 'text-xs text-gray-400';
                }

                return strength;
            }

            function checkPasswordMatch() {
                if (confirmField.value && passwordField.value) {
                    if (confirmField.value === passwordField.value) {
                        matchIndicator.classList.remove('hidden');
                        return true;
                    } else {
                        matchIndicator.classList.add('hidden');
                        return false;
                    }
                } else {
                    matchIndicator.classList.add('hidden');
                    return false;
                }
            }

            function updateSubmitButton() {
                const strength = checkPasswordStrength(passwordField.value);
                const match = checkPasswordMatch();
                
                if (strength >= 3 && match) {
                    submitBtn.disabled = false;
                    submitBtn.className = submitBtn.className.replace('bg-gray-600 text-gray-400', '').replace('disabled:cursor-not-allowed', '');
                    submitBtn.classList.add('btn-enabled');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('btn-enabled');
                    if (!submitBtn.className.includes('bg-gray-600')) {
                        submitBtn.className += ' bg-gray-600 text-gray-400 disabled:cursor-not-allowed';
                    }
                }
            }

            passwordField.addEventListener('input', updateSubmitButton);
            confirmField.addEventListener('input', updateSubmitButton);

            // Form entrance animation
            const form = document.querySelector('form');
            form.style.opacity = '0';
            form.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                form.style.transition = 'all 0.6s ease-out';
                form.style.opacity = '1';
                form.style.transform = 'translateY(0)';
            }, 100);

            // Form submission loading state
            form.addEventListener('submit', function(e) {
                if (submitBtn.disabled) {
                    e.preventDefault();
                    return;
                }
                
                submitBtn.innerHTML = `
                    <span class="flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Resetting Password...
                    </span>
                `;
                submitBtn.disabled = true;
            });
        });
    </script>
</x-guest-layout>