    @vite('resources/css/app.css')

<section class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Welcome Back</h2>

        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" placeholder="example@gmail.com"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required value="{{old('email')}}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password" placeholder="********"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required value="{{old('password')}}"> 
            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition-colors">
                Login
            </button>

            <p class="mt-4 text-center text-sm">
                Don't have an account?
                <a href="/register" class="text-blue-600 hover:underline">Create one</a>
            </p>
             {{-- validation errors --}}
            @if ($errors->any())
            <ul class="px-4 oy-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </div>

</section>