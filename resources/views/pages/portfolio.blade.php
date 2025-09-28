<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/gallery/sevicesthubmail.png') }}" alt="Portfolio" class="absolute inset-0 w-full h-full object-cover">
        
        <!-- Text and Button Overlay -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg" style="font-family: 'Italiana', serif;">
                    Portfolio
                </h1>
                <p class="text-lg md:text-xl mb-8 drop-shadow-md max-w-4xl mx-auto px-4">
                    From custom furniture to complete home renovations, we bring decades of craftsmanship and attention to detail to every project.
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Filters -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 hover:bg-gray-700">
                    All Projects
                </button>
            </div>
        </div>
    </section>



<!-- Portfolio Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Project 1 - Interior with Green Walls -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/greenwall.jpg') }}" alt="Interior Renovation" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Interior Renovation</h3>
                    <p class="text-gray-600">Modern interior design with custom molding and elegant finishes.</p>
                </div>
            </div>

            <!-- Project 2 - Hallway with Built-in Storage -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/wallrenovation.png') }}" alt="Built-in Storage" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Built-in Storage</h3>
                    <p class="text-gray-600">Custom built-in wardrobes with intricate tile flooring design.</p>
                </div>
            </div>

            <!-- Project 3 - Outdoor Space -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/outdoor.jpg') }}" alt="Outdoor Living" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Outdoor Living</h3>
                    <p class="text-gray-600">Beautiful outdoor spaces with custom decking and landscaping.</p>
                </div>
            </div>

            <!-- Project 4 - Modern Kitchen -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/kitchen4.png') }}" alt="Modern Kitchen" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Modern Kitchen</h3>
                    <p class="text-gray-600">Contemporary kitchen design with custom cabinets and modern appliances.</p>
                </div>
            </div>

            <!-- Project 5 - Staircase Design -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/kitchen5.png') }}" alt="Staircase Design" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Staircase Design</h3>
                    <p class="text-gray-600">Custom staircase with elegant carpeting and integrated lighting.</p>
                </div>
            </div>

            <!-- Project 6 - Outdoor Deck -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                <div class="h-96 flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('images/gallery/outdoor.jpg') }}" alt="Outdoor Deck" class="max-h-full max-w-full object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">Outdoor Deck</h3>
                    <p class="text-gray-600">Composite decking with raised planters and modern outdoor living features.</p>
                </div>
            </div>

        </div>
    </div>
</section>




    <!-- Call to Action Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6" style="font-family: 'Italiana', serif;">Ready to Start Your Project?</h2>
            <p class="text-gray-600 mb-8 text-lg max-w-2xl mx-auto">
                Let us bring your vision to life with our expert craftsmanship and attention to detail.
            </p>
            <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                Get a Quote
            </button>
        </div>
    </section>
</x-layouts.app>