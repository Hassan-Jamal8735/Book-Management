<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // assign books to first user

        $book1 = Book::create([
            'title' => 'Introduction to Science',
            'author' => 'John Doe',
            'price' => 29.99,
            'published_date' => '2022-01-01',
            'user_id' => $user->id,
            'book_image' => null,
        ]);
        $book1->categories()->attach(Category::where('name', 'Science')->first());

        $book2 = Book::create([
            'title' => 'World History',
            'author' => 'Jane Smith',
            'price' => 19.99,
            'published_date' => '2021-06-15',
            'user_id' => $user->id,
            'book_image' => null,
        ]);
        $book2->categories()->attach(Category::where('name', 'History')->first());

        $book3 = Book::create([
            'title' => 'Fictional Tales',
            'author' => 'Alice Johnson',
            'price' => 15.50,
            'published_date' => '2020-09-20',
            'user_id' => $user->id,
            'book_image' => null,
        ]);
        $book3->categories()->attach(Category::where('name', 'Fiction')->first());
    }
}
