<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Borrow;
use App\Models\Book;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    protected $model = Borrow::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $book = Book::inRandomOrder()->first();
        return [
            'book_id' => $book ? $book->id : 1, // fallback if no books
            'assignee_name' => $this->faker->name(),
            'borrowed_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'returned_at' => null, // can be updated later
            'status' => 'borrowed',
        ];
    }
}
