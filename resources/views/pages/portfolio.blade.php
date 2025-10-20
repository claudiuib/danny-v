@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/gallery/portofolio.jpg') }}" alt="Portfolio" class="absolute inset-0 w-full h-full object-cover">
        
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
        @if($portfolios->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolios as $portfolio)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 max-w-xs mx-auto">
                        <div class="h-96 flex items-center justify-center bg-gray-100">
                            <img src="{{ Storage::url($portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2" style="font-family: 'Italiana', serif;">{{ $portfolio->title }}</h3>
                            <p class="text-gray-600">{{ $portfolio->description }}</p>
                            @if($portfolio->category)
                                <span class="inline-block mt-2 px-3 py-1 bg-gray-200 text-gray-700 text-sm rounded-full">
                                    {{ ucfirst($portfolio->category) }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">No Portfolio Items Yet</h3>
                <p class="text-gray-500">Portfolio items will appear here once they are added through the admin panel.</p>
            </div>
        @endif
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