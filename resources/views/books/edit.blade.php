<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - Enhanced UI</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white">
                    Edit Book
                </h2>
                <p class="text-gray-400 mt-2 text-lg">Update your digital library collection</p>
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

        .form-input.updated {
            border-color: rgba(34, 197, 94, 0.5);
            background: rgba(34, 197, 94, 0.05);
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

        /* Current Image Display */
        .current-image-container {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .current-image {
            max-width: 200px;
            max-height: 250px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
        }

        .image-info {
            color: #9ca3af;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .change-image-btn {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 1rem;
        }

        .change-image-btn:hover {
            background: rgba(59, 130, 246, 0.3);
            color: #dbeafe;
        }

        .remove-current-image {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-current-image:hover {
            background: rgba(239, 68, 68, 0.3);
            color: #fee2e2;
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

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4);
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

        /* Changes Detection */
        .changes-indicator {
            background: rgba(245, 158, 11, 0.2);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fbbf24;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: none;
            align-items: center;
            gap: 0.75rem;
        }

        .changes-indicator.show {
            display: flex;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Original Data Display */
        .original-data {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
        }

        .original-data h3 {
            color: #e5e7eb;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .original-data .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .original-data .data-item {
            background: rgba(255, 255, 255, 0.03);
            padding: 0.75rem;
            border-radius: 8px;
        }

        .original-data .data-label {
            color: #9ca3af;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .original-data .data-value {
            color: #e5e7eb;
            font-size: 0.875rem;
            word-break: break-word;
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

            .original-data .data-grid {
                grid-template-columns: 1fr;
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

            <!-- Changes Indicator -->
            <div class="changes-indicator" id="changesIndicator">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                You have unsaved changes. Don't forget to update your book!
            </div>

            <!-- Original Data Display -->
            <div class="original-data fade-in">
                <h3>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Current Book Information
                </h3>
                <div class="data-grid">
                    <div class="data-item">
                        <div class="data-label">Title</div>
                        <div class="data-value" id="originalTitle">{{ $book->title ?? 'Sample Book Title' }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Author</div>
                        <div class="data-value" id="originalAuthor">{{ $book->author ?? 'John Doe' }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Price</div>
                        <div class="data-value" id="originalPrice">${{ $book->price ?? '29.99' }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Published</div>
                        <div class="data-value" id="originalDate">{{ $book->published_date ?? '2024-01-15' }}</div>
                    </div>
                </div>
            </div>

            <!-- Form Container -->
            <div class="form-container fade-in">
                <form method="POST" action="{{ route('books.update', $book->id ?? 1) }}" enctype="multipart/form-data" id="editBookForm">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title" class="form-label required">Book Title</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   class="form-input" 
                                   placeholder="Enter the book title"
                                   value="{{ old('title', $book->title ?? 'Sample Book Title') }}"
                                   data-original="{{ $book->title ?? 'Sample Book Title' }}"
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
                                   value="{{ old('author', $book->author ?? 'John Doe') }}"
                                   data-original="{{ $book->author ?? 'John Doe' }}"
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
                                   value="{{ old('price', $book->price ?? '29.99') }}"
                                   data-original="{{ $book->price ?? '29.99' }}"
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
                                   value="{{ old('published_date', $book->published_date ?? '2024-01-15') }}"
                                   data-original="{{ $book->published_date ?? '2024-01-15' }}"
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
                        <label class="form-label">Book Cover Image</label>
                        
                        <!-- Current Image Display -->
                        <div class="current-image-container" id="currentImageContainer">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=200&h=250&fit=crop" 
                                 alt="Current book cover" 
                                 class="current-image" 
                                 id="currentImage">
                            <div class="image-info">Current book cover</div>
                            <div>
                                <button type="button" class="change-image-btn" id="changeImageBtn">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Change Image
                                </button>
                                <button type="button" class="remove-current-image" id="removeCurrentImageBtn">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Remove Image
                                </button>
                            </div>
                        </div>

                        <!-- New Image Upload -->
                        <div class="file-upload-container" id="fileUploadContainer" style="display: none;">
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
                        
                        <!-- New Image Preview -->
                        <div class="image-preview" id="imagePreview">
                            <img class="preview-image" id="previewImage" alt="New book cover preview">
                            <br>
                            <button type="button" class="remove-image" id="removeImage">Remove New Image</button>
                            <button type="button" class="btn btn-secondary" id="restoreCurrentImage" style="margin-left: 1rem;">Restore Current</button>
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
                                <!-- Sample categories - replace with dynamic content -->
                                <div class="multiselect-option" data-value="1" data-name="Fiction">
                                    <div class="multiselect-checkbox">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>Fiction</span>
                                </div>
                                <div class="multiselect-option" data-value="2" data-name="Mystery">
                                    <div class="multiselect-checkbox">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>Mystery</span>
                                </div>
                                <div class="multiselect-option" data-value="3" data-name="Science Fiction">
                                    <div class="multiselect-checkbox">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>Science Fiction</span>
                                </div>
                                <div class="multiselect-option" data-value="4" data-name="Romance">
                                    <div class="multiselect-checkbox">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>Romance</span>
                                </div>
                                <div class="multiselect-option" data-value="5" data-name="Thriller">
                                    <div class="multiselect-checkbox">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>Thriller</span>
                                </div>
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
                        <a href="{{ route('books.index') }}" class="btn btn-secondary" id="cancelBtn">Cancel</a>
                        <button type="submit" class="btn btn-primary" id="updateBtn">
                            <span class="btn-text">Update Book</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editBookForm');
            const changesIndicator = document.getElementById('changesIndicator');
            const updateBtn = document.getElementById('updateBtn');
            const btnText = updateBtn.querySelector('.btn-text');
            const cancelBtn = document.getElementById('cancelBtn');
            
            let hasChanges = false;
            let originalValues = {};
            let selectedCategoryIds = [1, 3]; // Example: Fiction and Science Fiction are pre-selected

            // Store original values for comparison
            const formInputs = form.querySelectorAll('input, select, textarea');
            formInputs.forEach(input => {
                if (input.type !== 'file' && input.name !== '_token' && input.name !== '_method') {
                    originalValues[input.name] = input.value;
                }
            });

            // Image Upload Functionality
            const currentImageContainer = document.getElementById('currentImageContainer');
            const fileUploadContainer = document.getElementById('fileUploadContainer');
            const fileInput = document.getElementById('book_image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const removeImageBtn = document.getElementById('removeImage');
            const changeImageBtn = document.getElementById('changeImageBtn');
            const removeCurrentImageBtn = document.getElementById('removeCurrentImageBtn');
            const restoreCurrentImageBtn = document.getElementById('restoreCurrentImage');

            // Change Image Button
            changeImageBtn.addEventListener('click', function() {
                currentImageContainer.style.display = 'none';
                fileUploadContainer.style.display = 'block';
                detectChanges();
            });

            // Remove Current Image Button
            removeCurrentImageBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove the current image?')) {
                    currentImageContainer.style.display = 'none';
                    fileUploadContainer.style.display = 'block';
                    // Add a hidden input to indicate image should be removed
                    const removeImageInput = document.createElement('input');
                    removeImageInput.type = 'hidden';
                    removeImageInput.name = 'remove_image';
                    removeImageInput.value = '1';
                    form.appendChild(removeImageInput);
                    detectChanges();
                }
            });

            // Restore Current Image Button
            restoreCurrentImageBtn.addEventListener('click', function() {
                fileInput.value = '';
                imagePreview.style.display = 'none';
                fileUploadContainer.style.display = 'none';
                currentImageContainer.style.display = 'block';
                // Remove the remove_image input if it exists
                const removeImageInput = form.querySelector('input[name="remove_image"]');
                if (removeImageInput) {
                    removeImageInput.remove();
                }
                detectChanges();
            });

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
                } else {
                    detectChanges();
                }
            });

            // Remove New Image
            removeImageBtn.addEventListener('click', function() {
                fileInput.value = '';
                imagePreview.style.display = 'none';
                fileUploadContainer.querySelector('.upload-content').style.display = 'block';
                detectChanges();
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
                    detectChanges();
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
            
            // Initialize with existing categories
            initializeCategories();

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
                    const categoryId = parseInt(this.dataset.value);
                    const categoryName = this.dataset.name;
                    
                    if (this.classList.contains('selected')) {
                        // Deselect
                        deselectCategory(categoryId, this);
                    } else {
                        // Select
                        selectCategory(categoryId, categoryName, this);
                    }
                    detectChanges();
                });
            });

            function initializeCategories() {
                selectedCategoryIds.forEach(id => {
                    const option = document.querySelector(`[data-value="${id}"]`);
                    if (option) {
                        const categoryName = option.dataset.name;
                        selectCategory(id, categoryName, option, false);
                    }
                });
            }

            function selectCategory(id, name, element, detectChange = true) {
                if (!selectedCategoryIds.includes(id)) {
                    selectedCategoryIds.push(id);
                }
                element.classList.add('selected');
                element.querySelector('svg').style.display = 'block';
                
                // Add chip if not already exists
                if (!selectedCategories.querySelector(`[data-id="${id}"]`)) {
                    const chip = document.createElement('div');
                    chip.className = 'category-chip';
                    chip.dataset.id = id;
                    chip.innerHTML = `
                        <span>${name}</span>
                        <span class="remove">×</span>
                    `;
                    
                    selectedCategories.appendChild(chip);
                    
                    // Remove chip functionality
                    chip.querySelector('.remove').addEventListener('click', function(e) {
                        e.stopPropagation();
                        deselectCategory(id, element);
                        detectChanges();
                    });
                }
                
                // Add hidden input if not already exists
                if (!categoryInputs.querySelector(`[data-id="${id}"]`)) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'categories[]';
                    hiddenInput.value = id;
                    hiddenInput.dataset.id = id;
                    categoryInputs.appendChild(hiddenInput);
                }
                
                updatePlaceholder();
                
                if (detectChange) {
                    detectChanges();
                }
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

            // Change Detection
            function detectChanges() {
                let currentHasChanges = false;
                
                // Check form inputs
                formInputs.forEach(input => {
                    if (input.type !== 'file' && input.name !== '_token' && input.name !== '_method') {
                        const currentValue = input.value;
                        const originalValue = input.dataset.original || originalValues[input.name] || '';
                        
                        if (currentValue !== originalValue) {
                            currentHasChanges = true;
                            input.classList.add('updated');
                        } else {
                            input.classList.remove('updated');
                        }
                    }
                });
                
                // Check file upload
                if (fileInput.files.length > 0 || form.querySelector('input[name="remove_image"]')) {
                    currentHasChanges = true;
                }
                
                // Check if image display state changed
                if (currentImageContainer.style.display === 'none') {
                    currentHasChanges = true;
                }
                
                // Check categories (assuming original selection was [1, 3])
                const originalCategories = [1, 3];
                if (!arraysEqual(selectedCategoryIds.sort(), originalCategories.sort())) {
                    currentHasChanges = true;
                }
                
                hasChanges = currentHasChanges;
                
                // Show/hide changes indicator
                if (hasChanges) {
                    changesIndicator.classList.add('show');
                } else {
                    changesIndicator.classList.remove('show');
                }
            }

            function arraysEqual(a, b) {
                if (a.length !== b.length) return false;
                for (let i = 0; i < a.length; i++) {
                    if (a[i] !== b[i]) return false;
                }
                return true;
            }

            // Form change listeners
            formInputs.forEach(input => {
                input.addEventListener('input', detectChanges);
                input.addEventListener('change', detectChanges);
            });

            // Form Submission
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
                updateBtn.disabled = true;
                btnText.innerHTML = '<div class="loading"></div>Updating...';
                
                // Hide changes indicator
                changesIndicator.classList.remove('show');
            });

            // Warn before leaving with unsaved changes
            window.addEventListener('beforeunload', function(e) {
                if (hasChanges) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            // Cancel button warning
            cancelBtn.addEventListener('click', function(e) {
                if (hasChanges) {
                    if (!confirm('You have unsaved changes. Are you sure you want to leave?')) {
                        e.preventDefault();
                    }
                }
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + Enter to submit
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    e.preventDefault();
                    if (!updateBtn.disabled && hasChanges) {
                        form.submit();
                    }
                }
                
                // Ctrl/Cmd + S to save
                if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                    e.preventDefault();
                    if (!updateBtn.disabled && hasChanges) {
                        form.submit();
                    }
                }
                
                // Escape to cancel
                if (e.key === 'Escape') {
                    if (hasChanges) {
                        if (confirm('You have unsaved changes. Are you sure you want to leave?')) {
                            window.location.href = cancelBtn.href;
                        }
                    } else {
                        window.location.href = cancelBtn.href;
                    }
                }
            });

            // Auto-focus first changed input or first input
            setTimeout(() => {
                const changedInput = form.querySelector('.form-input.updated');
                const firstInput = form.querySelector('.form-input');
                if (changedInput) {
                    changedInput.focus();
                } else if (firstInput) {
                    firstInput.focus();
                }
            }, 500);

            // Auto-save to localStorage
            const formData = {};
            
            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (input.name && input.name !== '_token' && input.name !== '_method') {
                        formData[this.name] = this.value;
                        localStorage.setItem('editBookFormData', JSON.stringify(formData));
                    }
                });
            });

            // Clear saved data on successful submission
            form.addEventListener('submit', function() {
                setTimeout(() => {
                    localStorage.removeItem('editBookFormData');
                }, 1000);
            });
        });
    </script>

</x-app-layout>