<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodeShelf</title>
    @vite('resources/css/app.css')
  </head>

  <body class="min-h-screen flex flex-col items-center justify-center bg-linear-to-br from-sky-100 via-white to-sky-50 text-gray-800 font-sans">
    <div class="text-center space-y-6">
      <h1 class="text-4xl font-extrabold text-sky-700 tracking-tight">
        📚 Welcome to <span class="text-sky-900">The CodeShelf Library</span>
      </h1>

      <p class="text-gray-600 text-lg max-w-md mx-auto">
        Explore a world of books — from classics to new releases.
      </p>

      <a 
        href="{{route('auth.register')}}"
        class="inline-block px-6 py-3 bg-sky-600 text-white font-semibold rounded-xl shadow-md hover:bg-sky-700 hover:shadow-lg transition-all duration-300"
      >
        Access Books Library
      </a>
    </div>
  </body>
</html>
