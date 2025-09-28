<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/gallery/sevicesthubmail.png') }}" alt="Contact" class="absolute inset-0 w-full h-full object-cover">
        
        <!-- Text Overlay -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg" style="font-family: 'Italiana', serif;">
                    Contact
                </h1>
                <p class="text-lg md:text-xl mb-8 drop-shadow-md max-w-4xl mx-auto px-4">
                    From custom furniture to complete home renovations, we bring decades of craftsmanship and attention to detail to every project.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information Cards -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Phone Card -->
                <div class="bg-gray-100 p-8 text-center rounded-lg">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Phone</h3>
                    <p class="text-gray-600 mb-4">Call us directly for immediate assistance</p>
                    <p class="text-gray-800 font-semibold">07481567890</p>
                </div>

                <!-- Email Card -->
                <div class="bg-gray-100 p-8 text-center rounded-lg">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Email</h3>
                    <p class="text-gray-600 mb-4">Send us a detailed message</p>
                    <p class="text-gray-800 font-semibold">info@dannyv.com</p>
                </div>

                <!-- Location Card -->
                <div class="bg-gray-100 p-8 text-center rounded-lg">
                    <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Location</h3>
                    <p class="text-gray-600 mb-4">Visit our workshop and showroom</p>
                    <p class="text-gray-800 font-semibold">123 Craftsman Ave London</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Get In Touch and Contact Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Get In Touch Section -->
                <div>
                    <h2 class="text-4xl font-bold mb-8" style="font-family: 'Italiana', serif;">Get In Touch</h2>
                    <p class="text-gray-600 mb-8 text-lg">
                        Ready to start your next project? Fill out the form below and we'll get back to you within 24 hours. Whether you need custom furniture, home renovations, or just have questions about our services, we're here to help.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4 mt-3 flex-shrink-0"></span>
                            <p class="text-gray-700">We offer complimentary project consultations to discuss your vision and provide expert recommendations.</p>
                        </div>
                        <div class="flex items-start">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4 mt-3 flex-shrink-0"></span>
                            <p class="text-gray-700">Fully licensed contractors with comprehensive insurance coverage for your peace of mind.</p>
                        </div>
                        <div class="flex items-start">
                            <span class="w-2 h-2 bg-orange-600 rounded-full mr-4 mt-3 flex-shrink-0"></span>
                            <p class="text-gray-700">We stand behind our work with comprehensive warranties on all craftsmanship and materials.</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-gray-100 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-6">Send Us a Message</h3>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" id="full_name" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="project_type" class="block text-sm font-medium text-gray-700 mb-2">Project Type</label>
                                <select id="project_type" name="project_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="">Select a service</option>
                                    <option value="kitchen-cabinets">Kitchen Cabinets</option>
                                    <option value="home-renovations">Home Renovations</option>
                                    <option value="trim-molding">Trim & Molding</option>
                                    <option value="custom-furniture">Custom Furniture</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="project_details" class="block text-sm font-medium text-gray-700 mb-2">Project Details *</label>
                            <textarea id="project_details" name="project_details" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Please describe your project in detail..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>