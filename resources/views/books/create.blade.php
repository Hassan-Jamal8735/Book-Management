<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white">
                    Add New Book
                </h2>
                <p class="text-gray-400 mt-2 text-lg">Expand your digital library collection</p>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Library
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

        /* Form Container */
        .form-container {
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 3rem;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.03), rgba(138, 43, 226, 0.03));
            opacity: 1;
        }

        .form-container > * {
            position: relative;
            z-index: 1;
        }

        /* Form Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        /* Labels */
        .form-label {
            display: block;
            font-size: 1rem;
            font-weight: 600;
            color: #e5e7eb;
            margin-bottom: 0.75rem;
            transition: color 0.3s ease;
        }

        .form-label.required::after {
            content: ' *';
            color: #f87171;
        }

        /* Input Styles */
        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* File Upload Styles */
        .file-upload-container {
            position: relative;
            border: 2px dashed rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.02);
        }

        .file-upload-container:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(59, 130, 246, 0.05);
        }

        .file-upload-container.dragover {
            border-color: rgba(59, 130, 246, 0.8);
            background: rgba(59, 130, 246, 0.1);
            transform: scale(1.02);
        }

        .file-input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .file-upload-container:hover .upload-icon {
            color: #60a5fa;
        }

        .upload-text {
            color: #d1d5db;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .upload-subtext {
            color: #9ca3af;
            font-size: 0.875rem;
        }

        /* Image Preview */
        .image-preview {
            display: none;
            margin-top: 1rem;
            text-align: center;
        }

        .preview-image {
            max-width: 200px;
            max-height: 250px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
        }

        .remove-image {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-image:hover {
            background: rgba(239, 68, 68, 0.3);
            color: #fee2e2;
        }

        /* Multi-Select Styles */
        .multi-select-container {
            position: relative;
        }

        .form-select[multiple] {
            min-height: 120px;
            padding: 0.75rem;
        }

        .form-select[multiple] option {
            background: #1a1a1a;
            color: white;
            padding: 0.5rem;
            border-radius: 6px;
            margin: 2px 0;
        }

        .form-select[multiple] option:checked {
            background: rgba(59, 130, 246, 0.3);
            color: #dbeafe;
        }

        /* Custom Multi-Select */
        .custom-multiselect {
            position: relative;
        }

        .multiselect-trigger {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .multiselect-trigger:hover {
            border-color: rgba(59, 130, 246, 0.5);
            background: rgba(255, 255, 255, 0.1);
        }

        .selected-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .category-chip {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-chip .remove {
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .category-chip .remove:hover {
            opacity: 1;
        }

        .multiselect-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            margin-top: 0.25rem;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .multiselect-dropdown.show {
            display: block;
            animation: dropdownSlide 0.3s ease-out;
        }

        @keyframes dropdownSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .multiselect-option {
            padding: 0.75rem 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .multiselect-option:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .multiselect-option.selected {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
        }

        .multiselect-checkbox {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .multiselect-option.selected .multiselect-checkbox {
            background: #3b82f6;
            border-color: #3b82f6;
        }

        /* Button Styles */
        .btn {
            padding: 1rem 2.5rem;
            border-radius: 12px;
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
            min-width: 140px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.4);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 2rem;
        }

        /* Error Messages */
        .error-message {
            color: #fca5a5;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Success Messages */
        .success-message {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
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
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Form Validation */
        .form-input:invalid, .form-select:invalid {
            border-color: rgba(239, 68, 68, 0.5);
        }

        .form-input:valid, .form-select:valid {
            border-color: rgba(34, 197, 94, 0.3);
        }

        /* Progress Steps */
        .form-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .progress-step::after {
            content: '';
            position: absolute;
            top: 25px;
            left: 50%;
            width: 100%;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        .progress-step:last-child::after {
            display: none;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step-circle.active {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-color: #007bff;
            color: white;
        }

        .step-circle.completed {
            background: #10b981;
            border-color: #10b981;
            color: white;
        }

        .step-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .progress-step.active .step-label {
            color: #60a5fa;
        }

        .progress-step.completed .step-label {
            color: #10b981;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .form-progress {
                margin-bottom: 2rem;
            }

            .step-circle {
                width: 40px;
                height: 40px;
            }

            .step-label {
                font-size: 0.75rem;
            }
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

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="py-8 min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="success-message fade-in">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Container -->
            <div class="form-container fade-in">
                <!-- Form Progress -->
                <div class="form-progress">
                    <div class="progress-step active">
                        <div class="step-circle active">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <div class="step-label">Book Details</div>
                    </div>
                    <div class="progress-step">
                        <div class="step-circle">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="step-label">Image & Categories</div>
                    </div>
                    <div class="progress-step">
                        <div class="step-circle">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="step-label">Review & Save</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" id="bookForm">
                    @csrf

                    <div class="form-grid">
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title" class="form-label required">Book Title</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   class="form-input" 
                                   placeholder="Enter the book title"
                                   value="{{ old('title') }}"
                                   required>
                            @error('title')
                                <div class="error-message">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div class="form-group">
                            <label for="author" class="form-label required">Author</label>
                            <input type="text" 
                                   id="author" 
                                   name="author" 
                                   class="form-input" 
                                   placeholder="Enter the author's name"
                                   value="{{ old('author') }}"
                                   required>
                            @error('author')
                                <div class="error-message">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price" class="form-label required">Price ($)</label>
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   step="0.01" 
                                   min="0"
                                   class="form-input" 
                                   placeholder="0.00"
                                   value="{{ old('price') }}"
                                   required>
                            @error('price')
                                <div class="error-message">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Published Date -->
                        <div class="form-group">
                            <label for="published_date" class="form-label required">Published Date</label>
                            <input type="date" 
                                   id="published_date" 
                                   name="published_date" 
                                   class="form-input"
                                   value="{{ old('published_date') }}"
                                   required>
                            @error('published_date')
                                <div class="error-message">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Book Image Upload -->
                    <div class="form-group full-width">
                        <label for="book_image" class="form-label">Book Cover Image</label>
                        <div class="file-upload-container" id="fileUploadContainer">
                            <input type="file" 
                                   id="book_image" 
                                   name="book_image" 
                                   class="file-input"
                                   accept="image/*">
                            <div class="upload-content">
                                <svg class="upload-icon" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"/>
                                </svg>
                                <div class="upload-text">Click to upload or drag and drop</div>
                                <div class="upload-subtext">PNG, JPG, JPEG up to 5MB</div>
                            </div>
                        </div>
                        <div class="image-preview" id="imagePreview">
                            <img class="preview-image" id="previewImage" alt="Book cover preview">
                            <br>
                            <button type="button" class="remove-image" id="removeImage">Remove Image</button>
                        </div>
                        @error('book_image')
                            <div class="error-message">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Categories -->
                    <div class="form-group full-width">
                        <label class="form-label">Categories</label>
                        <div class="custom-multiselect">
                            <div class="multiselect-trigger" id="multiselectTrigger">
                                <div>
                                    <div class="selected-categories" id="selectedCategories"></div>
                                    <span class="placeholder" id="categoryPlaceholder">Select categories...</span>
                                </div>
                                <svg class="w-5 h-5 transition-transform" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="multiselect-dropdown" id="multiselectDropdown">
                                @foreach($categories as $category)
                                    <div class="multiselect-option" data-value="{{ $category->id }}">
                                        <div class="multiselect-checkbox">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span>{{ $category->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Hidden inputs for selected categories -->
                            <div id="categoryInputs"></div>
                        </div>
                        @error('categories')
                            <div class="error-message">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <span class="btn-text">Save Book</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File Upload Functionality
            const fileUploadContainer = document.getElementById('fileUploadContainer');
            const fileInput = document.getElementById('book_image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const removeImageBtn = document.getElementById('removeImage');

            // Drag and Drop Events
            fileUploadContainer.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });

            fileUploadContainer.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
            });

            fileUploadContainer.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileSelect(files[0]);
                }
            });

            // File Input Change
            fileInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    handleFileSelect(e.target.files[0]);
                }
            });

            // Remove Image
            removeImageBtn.addEventListener('click', function() {
                fileInput.value = '';
                imagePreview.style.display = 'none';
                fileUploadContainer.querySelector('.upload-content').style.display = 'block';
            });

            function handleFileSelect(file) {
                // Validate file type
                if (!file.type.match('image.*')) {
                    alert('Please select a valid image file (PNG, JPG, JPEG)');
                    return;
                }

                // Validate file size (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB');
                    return;
                }

                // Create preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.style.display = 'block';
                    fileUploadContainer.querySelector('.upload-content').style.display = 'none';
                };
                reader.readAsDataURL(file);

                // Set the file to input (for drag & drop)
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
            }

            // Custom Multi-Select Functionality
            const multiselectTrigger = document.getElementById('multiselectTrigger');
            const multiselectDropdown = document.getElementById('multiselectDropdown');
            const selectedCategories = document.getElementById('selectedCategories');
            const categoryPlaceholder = document.getElementById('categoryPlaceholder');
            const categoryInputs = document.getElementById('categoryInputs');
            const dropdownArrow = document.getElementById('dropdownArrow');
            
            let selectedCategoryIds = [];

            // Toggle dropdown
            multiselectTrigger.addEventListener('click', function() {
                const isOpen = multiselectDropdown.classList.contains('show');
                if (isOpen) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.custom-multiselect')) {
                    closeDropdown();
                }
            });

            function openDropdown() {
                multiselectDropdown.classList.add('show');
                dropdownArrow.style.transform = 'rotate(180deg)';
            }

            function closeDropdown() {
                multiselectDropdown.classList.remove('show');
                dropdownArrow.style.transform = 'rotate(0deg)';
            }

            // Category selection
            const categoryOptions = document.querySelectorAll('.multiselect-option');
            categoryOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const categoryId = this.dataset.value;
                    const categoryName = this.querySelector('span').textContent;
                    
                    if (this.classList.contains('selected')) {
                        // Deselect
                        deselectCategory(categoryId, this);
                    } else {
                        // Select
                        selectCategory(categoryId, categoryName, this);
                    }
                });
            });

            function selectCategory(id, name, element) {
                selectedCategoryIds.push(id);
                element.classList.add('selected');
                element.querySelector('svg').style.display = 'block';
                
                // Add chip
                const chip = document.createElement('div');
                chip.className = 'category-chip';
                chip.dataset.id = id;
                chip.innerHTML = `
                    <span>${name}</span>
                    <span class="remove">×</span>
                `;
                
                selectedCategories.appendChild(chip);
                
                // Add hidden input
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'categories[]';
                hiddenInput.value = id;
                hiddenInput.dataset.id = id;
                categoryInputs.appendChild(hiddenInput);
                
                updatePlaceholder();
                
                // Remove chip functionality
                chip.querySelector('.remove').addEventListener('click', function(e) {
                    e.stopPropagation();
                    deselectCategory(id, element);
                });
            }

            function deselectCategory(id, element) {
                selectedCategoryIds = selectedCategoryIds.filter(catId => catId !== id);
                element.classList.remove('selected');
                element.querySelector('svg').style.display = 'none';
                
                // Remove chip
                const chip = selectedCategories.querySelector(`[data-id="${id}"]`);
                if (chip) chip.remove();
                
                // Remove hidden input
                const hiddenInput = categoryInputs.querySelector(`[data-id="${id}"]`);
                if (hiddenInput) hiddenInput.remove();
                
                updatePlaceholder();
            }

            function updatePlaceholder() {
                if (selectedCategoryIds.length > 0) {
                    categoryPlaceholder.style.display = 'none';
                } else {
                    categoryPlaceholder.style.display = 'block';
                }
            }

            // Form Submission with Loading State
            const form = document.getElementById('bookForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');

            form.addEventListener('submit', function(e) {
                // Basic validation
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.focus();
                        return false;
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    return;
                }

                // Show loading state
                submitBtn.disabled = true;
                btnText.innerHTML = '<div class="loading"></div>Saving...';
                
                // Update progress steps
                updateProgressSteps();
            });

            // Form Progress Steps
            function updateProgressSteps() {
                const steps = document.querySelectorAll('.progress-step');
                const circles = document.querySelectorAll('.step-circle');
                
                // Animate through steps
                setTimeout(() => {
                    steps[0].classList.add('completed');
                    circles[0].classList.remove('active');
                    circles[0].classList.add('completed');
                    circles[0].innerHTML = `
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    `;
                    steps[1].classList.add('active');
                    circles[1].classList.add('active');
                }, 500);

                setTimeout(() => {
                    steps[1].classList.add('completed');
                    circles[1].classList.remove('active');
                    circles[1].classList.add('completed');
                    circles[1].innerHTML = `
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    `;
                    steps[2].classList.add('active');
                    circles[2].classList.add('active');
                }, 1000);
            }

            // Real-time Validation
            const inputs = form.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateField(this);
                    }
                });
            });

            function validateField(field) {
                const value = field.value.trim();
                const isRequired = field.hasAttribute('required');
                
                if (isRequired && !value) {
                    field.classList.add('error');
                    return false;
                } else {
                    field.classList.remove('error');
                    return true;
                }
            }

            // Auto-save to localStorage (optional)
            const formData = {};
            
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    formData[this.name] = this.value;
                    localStorage.setItem('bookFormData', JSON.stringify(formData));
                });
            });

            // Load saved data
            const savedData = localStorage.getItem('bookFormData');
            if (savedData) {
                const data = JSON.parse(savedData);
                Object.keys(data).forEach(key => {
                    const field = form.querySelector(`[name="${key}"]`);
                    if (field && !field.value) {
                        field.value = data[key];
                    }
                });
            }

            // Clear saved data on successful submission
            form.addEventListener('submit', function() {
                setTimeout(() => {
                    localStorage.removeItem('bookFormData');
                }, 1000);
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + Enter to submit
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    e.preventDefault();
                    if (!submitBtn.disabled) {
                        form.submit();
                    }
                }
                
                // Escape to go back
                if (e.key === 'Escape') {
                    const backBtn = document.querySelector('.btn-secondary');
                    if (backBtn) {
                        if (confirm('Are you sure you want to leave? Any unsaved changes will be lost.')) {
                            window.location.href = backBtn.href;
                        }
                    }
                }
            });

            // Form change detection
            let formChanged = false;
            form.addEventListener('input', function() {
                formChanged = true;
            });

            form.addEventListener('change', function() {
                formChanged = true;
            });

            // Warn before leaving with unsaved changes
            window.addEventListener('beforeunload', function(e) {
                if (formChanged && !submitBtn.disabled) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            // Auto-focus first input
            setTimeout(() => {
                const firstInput = form.querySelector('.form-input');
                if (firstInput) {
                    firstInput.focus();
                }
            }, 500);
        });
    </script>

</x-app-layout>