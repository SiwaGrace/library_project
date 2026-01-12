    @vite('resources/css/app.css')

<section class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Create an Account</h2>

        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-1">Name</label>
                <input type="text" name="name" placeholder="Your name"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required
                    value="{{old('name')}}">
            </div>

<input type="hidden" name="referred_by" value="{{ $ref ?? '' }}">


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

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="********"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required value="{{old('password_confirmation')}}"> 
            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition-colors">
                Register
            </button>

            <p class="mt-4 text-center text-sm">
                Already have an account? 
                <a href="{{route('auth.login')}}" class="text-blue-600 hover:underline">Login</a>
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