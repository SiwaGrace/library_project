@props(['highlight' => false, 'book'])

<div @class([
        'highlight' => $highlight,
        'bg-white shadow-md rounded-lg p-4 flex justify-between items-center transition transform hover:scale-105',
    ])>
    
    <!-- Left section: Title & Author -->
    <div class="flex flex-col space-y-1">
        <p class="font-bold text-lg text-gray-800">{{ $book->title }}</p>
        <p class="text-sm text-gray-500">by {{ $book->author }}</p>
        <p class="text-xs text-gray-400">
            Category: {{ $book->category->name ?? 'Uncategorized' }}
        </p>
    </div>

    <!-- Middle section: Availability Badge -->
    <div>
        @if($book->available)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">
                Available
            </span>
        @else
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                Borrowed
            </span>
        @endif
    </div>

    <!-- Right section: Action Buttons -->
    <div class="flex space-x-2">
        <!-- View Details -->
        <a {{ $attributes->merge([
                'href' => route('books.about', $book->id),
                'class' => 'px-3 py-1 rounded-md bg-orange-400 text-white hover:bg-orange-500 transition text-sm'
            ]) }}>
            View
        </a>

        <!-- Edit -->
        <a href="{{ route('books.edit', $book->id) }}" 
           class="px-3 py-1 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition text-sm">
            Edit
        </a>

        <!-- Delete -->
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-3 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 transition text-sm">
                Delete
            </button>
        </form>
    </div>
</div>
