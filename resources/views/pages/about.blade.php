<x-layouts.app>
    <!-- Hero Section with Image and Text Overlay -->
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/carousel/kitchen2.png ') }}" alt="Kitchen" class="absolute inset-0 w-full h-full object-cover">
        
           <!-- Text and Button Overlay -->
    <div class="absolute bottom-3 md:bottom-4 left-1/2 transform -translate-x-1/2 z-40 text-center px-4 w-full">
        <!-- Main Heading -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 md:mb-8" style="font-family: 'Italiana', serif;">About Us</h1>
        
        <!-- Subheading -->
        <p class="text-white mb-6 md:mb-10 text-sm sm:text-base md:text-xl" style="font-family: 'Italiana', serif;">Every Piece of Wood Has a Story—We Help Tell It</p>
        
       
    </div>
    
        
        
    </section>

    <!-- Description and Image Section -->
    <section class="container mx-auto my-8 px-4">
    
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Description (Left) -->
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-4 mt-2 text-center" style="font-family: 'Italiana', serif;">
                    OUR STORY
                </h2>

                @if($aboutContents && $aboutContents->count() > 0)
                    @foreach($aboutContents as $content)
                        <div class="text-gray-600 mt-6 text-justify">
                            {!! nl2br(e($content->content)) !!}
                        </div>
                    @endforeach
                @else
                    <div class="text-gray-600 mt-6 text-justify">
                        <p>No content available. Please add content through the admin panel.</p>
                    </div>
                @endif

           

            </div>
            <!-- Image (Right) -->
            <div class="md:w-1/2 flex md:justify-end mb-6">
                <img src="{{ asset('/images/gallery/greenwall.jpg') }}" alt="Sample Image" class="h-auto object-cover rounded-lg">
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" style="font-family: 'Italiana', serif;">OUR VALUES</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Quality Craftsmanship -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quality Craftsmanship</h3>
                    <p class="text-gray-600">We never compromise on quality. Every piece is crafted with attention to detail and built to last generations.</p>
                </div>

                <!-- Reliable Service -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Reliable Service</h3>
                    <p class="text-gray-600">We respect your time and deliver projects on schedule. Our word is our bond, and we stand behind every commitment.</p>
                </div>

                <!-- Customer Focus -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Customer Focus</h3>
                    <p class="text-gray-600">Your vision drives our work. We listen, understand, and create solutions that exceed your expectations.</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>