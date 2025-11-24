<x-layout>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    
    <form 
    action="{{route('books.store')}}" 
    method="POST"
    class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md"
    >
    @csrf

      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Create a New Book
      </h2>

      <!-- Book Title -->
      <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium mb-2">
          Book Title
        </label>
        <input
          type="text"
          id="title"
          name="title"
          value=""
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>

      <!-- Book Author -->
      <div class="mb-4">
        <label for="author" class="block text-gray-700 font-medium mb-2">
          Author
        </label>
        <input
          type="text"
          id="author"
          name="author"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>

      <!-- Book Description -->
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">
          Description
        </label>
        <textarea
          rows="5"
          id="description"
          name="description"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        ></textarea>
      </div>

      <!-- Select Category -->
      <div class="mb-6">
        <label for="category_id" class="block text-gray-700 font-medium mb-2">
          Category
        </label>
        <select
          id="category_id"
          name="category_id"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white 
                 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option value="" disabled selected>Select a category</option>
          @foreach ($categories as $category)
              <option value="{{$category->id}}">
                {{$category->name}}
              </option>
          @endforeach
        </select>
      </div>

      <button
        type="submit"
        class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg 
               hover:bg-indigo-700 transition duration-200"
      >
        Create Book
      </button>

      <!-- Validation Errors -->
    

    </form>
  </div>
</x-layout>
