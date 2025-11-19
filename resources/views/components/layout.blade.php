<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Library</title>
    @vite('resources/css/app.css')
  </head>

  <body class="min-h-screen bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-sky-700 text-white shadow-md">
      <nav class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo / Title -->
        <h1 class="text-2xl font-bold tracking-tight">
          <a href="{{route('books.index')}}">📚CodeShelf</a>
        </h1>

        <!-- Nav Links -->
        <ul class="flex space-x-6">
          <li>
            <a 
              href="{{route('books.allBooks')}}" 
              class="hover:text-sky-200 transition-colors duration-200"
            >
              Books
            </a>
          </li>
          <li>
            <a 
              href="{{route('books.add')}}" 
              class="hover:text-sky-200 transition-colors duration-200"
            >
              Add Book
            </a>
          </li>
          <li>
            <a 
              href="{{route('books.track')}}" 
              class="hover:text-sky-200 transition-colors duration-200"
            >
              Track Books
            </a>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Main content -->
    <main class="container mx-auto px-6 py-10">
      {{ $slot }}
    </main>
  </body>
</html>
