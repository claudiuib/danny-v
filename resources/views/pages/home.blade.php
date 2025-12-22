<x-layouts.app>
    @livewire('hero-carousel')


    <!-- Description and Image Section -->
    <section class="container mx-auto my-8 px-4">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Description (Left) -->
            <div class="md:w-1/2">
                @if($mainPageContent)
                    <h2 class="text-3xl font-bold mb-4 mt-2 text-center" style="font-family: 'Italiana', serif;">
                        {{ $mainPageContent->section_name }}
                    </h2>

                    <div class="text-gray-600 mt-6 text-justify whitespace-pre-line">
                        {{ $mainPageContent->content }}
                    </div>

                    @if($mainPageContent->services && count($mainPageContent->services_array) > 0)
                        <ul class="list-disc pl-4 mt-2 text-justify">
                            @foreach($mainPageContent->services_array as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <!-- Fallback content if no main page content is set -->
                    <h2 class="text-3xl font-bold mb-4 mt-2 text-center" style="font-family: 'Italiana', serif;">
                        WHAT WE DO
                    </h2>

                    <p class="text-gray-600 mt-6 text-justify">
                        We offer expert carpentry services across London with a focus on quality craftsmanship,
                        reliable service, and lasting results. Whether you're updating your home, repairing old features,
                        or enhancing your outdoor space, we're here to help.
                        Our range of high-quality carpentry services across London, includes:
                    </p>

                    <ul class="list-disc pl-4 mt-2 text-justify">
                        <li>Garden fence installation and repairs</li>
                        <li>New joist installation and existing joist repairs</li>
                        <li>Floorboard leveling</li>
                        <li>Decking installation</li>
                        <li>Partition wall construction</li>
                        <li>Dado rails &amp; decorative mouldings</li>
                        <li>Internal AC unit covers</li>
                        <li>Sash window repairs</li>
                        <li>Skirting board installation</li>
                        <li>Kitchen installation</li>
                        <li>Poker door installation</li>
                    </ul>
                @endif
            </div>
            <!-- Image (Right) -->
            <div class="md:w-1/2">
                <img src="{{ asset('/images/carousel/homepage4pictures.png') }}" alt="Sample Image" class="w-full h-auto object-cover rounded-lg">
            </div>
        </div>
    </section>
</x-layouts.app>