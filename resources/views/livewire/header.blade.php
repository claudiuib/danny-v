<div>
<nav class="bg-white text-black p-4">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="Carpenter Logo" class="h-12 w-auto">
        </div>

        <!-- Mobile toggle -->
        <input id="nav-toggle" type="checkbox" class="peer hidden" />
        <label for="nav-toggle" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-black hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 cursor-pointer">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>

        <!-- Menu -->
        <ul class="hidden md:flex md:space-x-6 md:items-center md:static absolute left-0 right-0 top-full md:top-auto bg-white md:bg-transparent peer-checked:flex peer-checked:flex-col peer-checked:space-y-3 md:peer-checked:space-y-0 px-4 md:px-0 py-4 md:py-0 shadow md:shadow-none">
            <li><a href="{{ route('home') }}" class="block px-2 py-1 hover:text-gray-600">Home</a></li>
            <li><a href="{{ route('about') }}" class="block px-2 py-1 hover:text-gray-600">About</a></li>
            <li><a href="{{ route('services') }}" class="block px-2 py-1 hover:text-gray-600">Services</a></li>
            <li><a href="{{ route('portfolio') }}" class="block px-2 py-1 hover:text-gray-600">Portfolio</a></li>
            <li><a href="{{ route('contact') }}" class="block px-2 py-1 hover:text-gray-600">Contact</a></li>
        </ul>
    </div>
</nav>
</div>
