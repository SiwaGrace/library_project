<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Library</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

  </head>

  <body class="min-h-screen bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-sky-700 text-white shadow-md">
      <nav class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo / Title -->
        <h1 class="text-2xl font-bold tracking-tight">
          <a href="{{ auth()->check() ? (auth()->user()->isAdmin() ? route('books.index') : route('dashboard')) : route('welcome') }}">
            📚CodeShelf
          </a>
        </h1>

        <!-- Nav Links -->
        <ul class="flex space-x-6 items-center">
          @auth
            @if(auth()->user()->isAdmin())
              <li><a href="{{ route('books.admin.allBooks') }}" class="hover:text-sky-200">All Books (Admin)</a></li>
              <li><a href="{{ route('books.add') }}" class="hover:text-sky-200">Add Book</a></li>
              <li><a href="{{ route('books.track') }}" class="hover:text-sky-200">Track Books</a></li>
            @else
              <li><a href="{{ route('books.user.allBooks') }}" class="hover:text-sky-200">All Books</a></li>
              <li><a href="{{ route('dashboard') }}" class="hover:text-sky-200">Dashboard</a></li>
            @endif

            <!-- Logout -->
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="hover:text-sky-200">Logout</button>
              </form>
            </li>
          @else
            <!-- Guest Links -->
            <li><a href="{{ route('auth.login') }}" class="hover:text-sky-200">Login</a></li>
            <li><a href="{{ route('auth.register') }}" class="hover:text-sky-200">Register</a></li>
          @endauth
        </ul>
      </nav>
    </header>

    <!-- Main content -->
    <main class="container mx-auto px-6 py-10">
      {{ $slot ?? '' }}
    </main>
  </body>
</html>
