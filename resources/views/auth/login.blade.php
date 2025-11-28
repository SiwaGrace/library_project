    @vite('resources/css/app.css')

<section class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Welcome Back</h2>

        <form>
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" placeholder="example@gmail.com"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" placeholder="********"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition-colors">
                Login
            </button>

            <p class="mt-4 text-center text-sm">
                Don't have an account?
                <a href="/register" class="text-blue-600 hover:underline">Create one</a>
            </p>
        </form>
    </div>

</section>