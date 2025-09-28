<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/gallery/sevicesthubmail.png') }}" alt="Carpentry Services" class="absolute inset-0 w-full h-full object-cover">
        
        <!-- Text and Button Overlay -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg" style="font-family: 'Italiana', serif;">
                    Our Carpentry Services
                </h1>
                <p class="text-lg md:text-xl mb-8 drop-shadow-md max-w-4xl mx-auto px-4">
                    From custom furniture to complete home renovations, we bring decades of craftsmanship and attention to detail to every project.
                </p>
            </div>
        </div>
    </section>

    <!-- Kitchen Cabinets Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold mb-6" style="font-family: 'Italiana', serif;">Kitchen Cabinets</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Transform your kitchen with custom-built cabinets that maximize storage and enhance your home's aesthetic appeal. We handle everything from design to installation, ensuring a perfect fit for your space.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Custom cabinet design</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Kitchen islands</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Cabinet refacing</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Pantry solutions</span>
                        </div>
                    </div>
                    
                    <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        Contact Us
                    </button>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('images/gallery/kitchen4.png') }}" alt="Kitchen Cabinets" class="h-80 object-contain shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Home Renovations Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row-reverse gap-12 items-center">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold mb-6" style="font-family: 'Italiana', serif;">Home Renovations</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Complete home renovation services including framing, flooring, trim work, and structural modifications. We manage every aspect of your project to ensure quality results and minimal disruption.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Room additions</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Bathroom remodels</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Basement finishing</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Attic conversions</span>
                        </div>
                    </div>
                    
                    <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        Contact Us
                    </button>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('images/gallery/wallrenovation.png') }}" alt="Home Renovations" class="h-80 object-contain shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Trim & Molding Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold mb-6" style="font-family: 'Italiana', serif;">Trim & Molding</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Add elegance and character to your home with custom trim work, crown molding, and architectural details. Our detailed craftsmanship enhances both traditional and contemporary spaces.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Crown molding</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Window casings</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Baseboards</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                            <span class="text-gray-700">Wainscoting</span>
                        </div>
                    </div>
                    
                    <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        Contact Us
                    </button>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('images/gallery/windowsrepair.png') }}" alt="Trim & Molding" class="h-80 object-contain shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Client Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" style="font-family: 'Italiana', serif;">WHAT OUR CLIENTS SAY</h2>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-gray-100 rounded-lg p-8 text-center">
                    <blockquote class="text-xl text-gray-700 mb-6 italic">
                        "Professional, reliable, and skilled craftsmen. Our deck renovation exceeded all expectations."
                    </blockquote>
                    <cite class="text-orange-600 font-semibold text-lg">Michael Chen</cite>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>