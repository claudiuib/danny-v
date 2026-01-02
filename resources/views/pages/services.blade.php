@php
    use Illuminate\Support\Facades\Storage;
@endphp

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

    @if($services->count() > 0)
        @foreach($services as $index => $service)
            <section class="py-16 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col lg:flex-row {{ $index % 2 == 1 ? 'lg:flex-row-reverse' : '' }} gap-12 items-center">
                        <div class="lg:w-1/2">
                            <h2 class="text-4xl font-bold mb-6" style="font-family: 'Italiana', serif;">{{ $service->title }}</h2>
                            <p class="text-gray-600 mb-8 text-lg">
                                {{ $service->description }}
                            </p>
                            
                            @if($service->features_array && count($service->features_array) > 0)
                                <div class="grid grid-cols-2 gap-4 mb-8">
                                    @foreach($service->features_array as $feature)
                                        <div class="flex items-center">
                                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>
                                            <span class="text-gray-700">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            
                            <!-- <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                                Contact Us
                            </button> -->
                            <a href="https://wa.me/447904658959?text={{ urlencode('Hi Danny, I am interested in your ' . $service->title . ' service. Could I get more information?') }}" 
   class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
    Contact Us
</a>
                        </div>
                        <div class="lg:w-1/2 flex justify-center">
                            @if($service->image_path)
                                <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}" class="h-80 object-contain shadow-lg">
                            @else
                                @if($index == 0)
                                    <img src="{{ asset('images/gallery/kitchen4.png') }}" alt="{{ $service->title }}" class="h-80 object-contain shadow-lg">
                                @elseif($index == 1)
                                    <img src="{{ asset('images/gallery/wallrenovation.png') }}" alt="{{ $service->title }}" class="h-80 object-contain shadow-lg">
                                @else
                                    <img src="{{ asset('images/gallery/windowsrepair.png') }}" alt="{{ $service->title }}" class="h-80 object-contain shadow-lg">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <!-- Default fallback if no services -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Our Services</h3>
                <p class="text-gray-500">Services will appear here once they are added through the admin panel.</p>
            </div>
        </section>
    @endif

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