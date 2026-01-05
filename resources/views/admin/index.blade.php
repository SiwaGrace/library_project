<x-layout>
  <div class="min-h-screen p-6 bg-linear-to-b from-sky-50 via-white to-sky-100">
    <!-- Header -->
    <header class="max-w-7xl mx-auto mb-8">
      <h1 class="text-3xl md:text-4xl font-extrabold text-sky-800">
        Welcome to Library Dashboard
      </h1>
      <p class="text-gray-600 mt-2">Overview of the library at a glance.
       {{ $user->first_name }}
      </p>
    </header>

    <!-- Cards -->
    <section class="max-w-7xl mx-auto grid gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-10">
      <!-- Total Books -->
      <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center gap-4 border border-sky-50">
        <div class="p-3 rounded-full bg-sky-100 text-sky-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 20l9-5-9-5-9 5 9 5z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 12V4" />
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Total Books</p>
          <p class="text-2xl font-bold text-gray-900">
            {{$length}}
</p>
        </div>
      </div>

      <!-- Borrowed Books -->
      <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center gap-4 border border-sky-50">
        <div class="p-3 rounded-full bg-yellow-100 text-yellow-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 7h18M7 7v10a2 2 0 002 2h6a2 2 0 002-2V7" />
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Borrowed Books</p>
          <p class="text-2xl font-bold text-gray-900">{{$borrowedBooks}}</p>
        </div>
      </div>

      <!-- Available Books -->
      <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center gap-4 border border-sky-50">
        <div class="p-3 rounded-full bg-green-100 text-green-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Available Books</p>
          <p class="text-2xl font-bold text-gray-900">{{$availableCount}}</p>
        </div>
      </div>

      <!-- Categories -->
      <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center gap-4 border border-sky-50">
        <div class="p-3 rounded-full bg-purple-100 text-purple-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Categories</p>
          <p class="text-2xl font-bold text-gray-900">{{$categoryLength}}</p>
        </div>
      </div>
    </section>

    <!-- Recent Books -->
    <section class="max-w-7xl mx-auto">
      <div class="bg-white rounded-2xl shadow-sm p-6 border border-sky-50">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-sky-800">Recent Books</h3>
          <a href="{{route('books.admin.allBooks')}}" class="text-sm text-sky-700 hover:underline">View all</a >
        </div>

        <div class="overflow-hidden rounded-lg border">
  <table class="min-w-full divide-y">
    <thead class="bg-sky-50">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
      </tr>
    </thead>

    <tbody class="bg-white divide-y">

      @foreach ($fourbooks as $book)
        <tr>
          <!-- Book Title -->
          <td class="px-4 py-3 text-sm text-gray-800">
            {{ $book->title }}
          </td>

          <!-- Book Author -->
          <td class="px-4 py-3 text-sm text-gray-600">
            {{ $book->author }}
          </td>

          <!-- Status -->
          <td class="px-4 py-3">
            @if ($book->available)
              <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                Available
              </span>
            @else
              <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                Borrowed
              </span>
            @endif
          </td>

          <!-- Action -->
          <td class="px-4 py-3 text-right">
            <a 
              href="{{ route('books.about', $book->id) }}" 
              class="text-sky-700 hover:underline text-sm">
              Details
            </a>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>

      </div>
    </section>
  </div>
</x-layout>
