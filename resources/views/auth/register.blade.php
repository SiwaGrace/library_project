    @vite('resources/css/app.css')

<section class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Create an Account</h2>

        <form>
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Name</label>
                <input type="text" placeholder="Your name"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

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
                Register
            </button>

            <p class="mt-4 text-center text-sm">
                Already have an account? 
                <a href="/login" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>

</section>