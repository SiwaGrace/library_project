<x-layout>
    <div class="max-w-3xl mx-auto my-10 bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">
            {{ $book->title }}
        </h1>

        <p class="text-sm text-gray-500 mb-2">
            <strong>Author:</strong> {{ $book->author }}
        </p>

        <p class="text-sm text-gray-500 mb-2">
            <strong>Category:</strong> {{ $book->category->name ?? 'Uncategorized' }}
        </p>

        <p class="text-sm text-gray-500 mb-4">
            <strong>Status:</strong> 
            @if ($book->available)
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                    Available
                </span>
            @else
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                    Borrowed
                </span>
            @endif
        </p>

        <h2 class="text-lg font-semibold text-gray-700 mb-2">Description</h2>
        <p class="text-gray-600 mb-6">
            {{ $book->description }}
        </p>

        <a href="{{ route('books.admin.allBooks') }}" class="text-sky-700 hover:underline">
            &larr; Back to Books
        </a>
    </div>
</x-layout>
