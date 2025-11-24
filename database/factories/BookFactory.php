<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        $titles = [
            "Clean Code",
            "The Pragmatic Programmer",
            "Refactoring: Improving the Design of Existing Code",
            "Design Patterns: Elements of Reusable Object-Oriented Software",
            "Eloquent JavaScript",
            "You Don’t Know JS Yet",
            "JavaScript: The Good Parts",
            "Introduction to Algorithms",
            "Cracking the Coding Interview",
            "Effective Java",
            "Head First Design Patterns",
            "Learning React",
            "Pro React",
            "Laravel Up & Running",
            "Mastering Laravel",
            "Fluent Python",
            "Python Crash Course",
            "Automate the Boring Stuff with Python",
            "Effective Python",
            "Learning Python",
            "Python Tricks",
            "Programming Rust",
            "Rust in Action",
            "Go in Action",
            "Introducing Go",
            "The Go Programming Language",
            "Node.js Design Patterns",
            "Mastering Node.js",
            "Fullstack React",
            "Fullstack Vue",
            "React Explained",
            "React Design Patterns and Best Practices",
            "Building Microservices",
            "Microservices Patterns",
            "System Design Interview – An Insider’s Guide",
            "Grokking Algorithms",
            "Data Structures & Algorithms in JavaScript",
            "Algorithms Unlocked",
            "Deep Learning",
            "Hands-On Machine Learning",
            "Artificial Intelligence: A Modern Approach",
            "Clean Architecture",
            "Domain-Driven Design",
            "Test-Driven Development: By Example",
            "Pro Git",
            "Docker Deep Dive",
            "Kubernetes: Up & Running"
        ];

        $authors = [
            "Robert C. Martin",
            "Martin Fowler",
            "Kent Beck",
            "Kyle Simpson",
            "Douglas Crockford",
            "Marijn Haverbeke",
            "Gayle Laakmann McDowell",
            "Thomas H. Cormen",
            "Joshua Bloch",
            "Eric Evans",
            "Steve McConnell",
            "Andrew Hunt",
            "David Thomas",
            "Luciano Ramalho",
            "Brian Goetz",
            "Rich Hickey",
            "Addy Osmani",
            "Wes Bos",
            "Dan Abramov",
            "Ryan Dahl",
            "Sandi Metz",
            "Vaughn Vernon",
            "Jeff Atwood",
            "Mark Richards",
            "Sam Newman",
        ];

        $descriptions = [
            "A practical and in-depth guide exploring core programming principles with real-world examples.",
            "Hands-on techniques and best practices for building modern, scalable applications.",
            "A deep dive into software engineering concepts like testing, refactoring, and architecture.",
            "An example-packed introduction to programming concepts with exercises and real-world projects.",
            "An advanced guide exploring concurrency, performance, and large-scale codebase management.",
            "A readable explanation of algorithms, data structures, and optimization strategies.",
            "A complete walkthrough of modern web development, including APIs, security, and deployment.",
            "Engineer-focused techniques for debugging, system design, and long-term code maintenance.",
        ];

        return [
            'title' => $this->faker->randomElement($titles),
            'author' => $this->faker->randomElement($authors),
            'description' => $this->faker->randomElement($descriptions),
            'available' => fake()->boolean(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
