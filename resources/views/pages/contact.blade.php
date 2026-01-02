<x-layouts.app>
    <section class="relative h-64 md:h-80 overflow-hidden bg-gray-300">
        <img src="{{ asset('images/gallery/contactthumbmail.jpg') }}" alt="Contact" class="absolute inset-0 w-full h-full object-cover">
        
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white" style="font-family: 'Italiana', serif;">
                    Contact
                </h1>
                <p class="text-lg md:text-xl mb-8 max-w-4xl mx-auto px-4 text-white">
                    From custom furniture to complete home renovations, we bring decades of craftsmanship and attention to detail to every project.
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                @if($contactInfo)
                    <div class="bg-gray-100 p-8 text-center rounded-lg">
                        <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Phone</h3>
                        <p class="text-gray-600 mb-4">Call us directly for immediate assistance</p>
                        <p class="text-gray-800 font-semibold">{{ $contactInfo->phone }}</p>
                    </div>

                    <div class="bg-gray-100 p-8 text-center rounded-lg">
                        <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Email</h3>
                        <p class="text-gray-600 mb-4">Send us a detailed message</p>
                        <p class="text-gray-800 font-semibold">{{ $contactInfo->email }}</p>
                    </div>

                    <div class="bg-gray-100 p-8 text-center rounded-lg">
                        <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Location</h3>
                        <p class="text-gray-600 mb-4">Visit our workshop and showroom</p>
                        <p class="text-gray-800 font-semibold">{{ $contactInfo->location }}</p>
                    </div>
                @else
                    <div class="col-span-3 text-center py-16">
                        <h3 class="text-2xl font-bold text-gray-600 mb-4">Contact Information</h3>
                        <p class="text-gray-500">Contact information will appear here once it's added through the admin panel.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl font-bold mb-8" style="font-family: 'Italiana', serif;">Get In Touch</h2>
                    @if($contactInfo && $contactInfo->description)
                        <div class="text-gray-600 mb-8 text-lg">
                            {!! nl2br(e($contactInfo->description)) !!}
                        </div>
                    @else
                        <p class="text-gray-600 mb-8 text-lg">
                            Ready to start your next project? Fill out the form below and we'll get back to you within 24 hours.
                        </p>
                    @endif
                    
                    <div class="space-y-6">
                        @if($contactInfo)
                            @foreach(['bullet_1', 'bullet_2', 'bullet_3'] as $bullet)
                                @if($contactInfo->$bullet)
                                    <div class="flex items-start">
                                        <span class="w-2 h-2 bg-orange-600 rounded-full mr-4 mt-3 flex-shrink-0"></span>
                                        <p class="text-gray-700">{!! nl2br(e($contactInfo->$bullet)) !!}</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="bg-gray-100 p-8 rounded-lg" id="form-wrapper">
                    <div id="form-content">
                        <h3 class="text-2xl font-bold mb-6">Send Us a Message</h3>
                        
                        <form id="contact-form" action="https://formsubmit.co/ajax/dannyvcarpentry@gmail.com" method="POST" class="space-y-6">
                            {{-- FormSubmit Options --}}
                            <input type="hidden" name="_subject" value="New Inquiry from Danny V Carpentry Website">
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_template" value="table">

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                                </div>
                                <div>
                                    <label for="project_type" class="block text-sm font-medium text-gray-700 mb-2">Project Type</label>
                                    <select name="project_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none bg-white">
                                        <option value="">Select a service</option>
                                        <option value="Kitchen Cabinets">Kitchen Cabinets</option>
                                        <option value="Home Renovations">Home Renovations</option>
                                        <option value="Trim & Molding">Trim & Molding</option>
                                        <option value="Custom Furniture">Custom Furniture</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Project Details *</label>
                                <textarea name="message" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 outline-none" placeholder="Please describe your project..."></textarea>
                            </div>
                            
                            <button type="submit" id="submit-button" class="w-full bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 flex items-center justify-center">
                                <span>Send Message</span>
                            </button>
                        </form>
                    </div>

                    <div id="success-response" class="hidden text-center py-12">
                        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Message Sent!</h3>
                        <p class="text-gray-600">Thank you for contacting us. We will get back to you shortly.</p>
                        <button onclick="window.location.reload()" class="mt-8 text-orange-600 font-semibold hover:underline">
                            Send another message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Script for handling AJAX submission --}}
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const button = document.getElementById('submit-button');
            const formContent = document.getElementById('form-content');
            const successResponse = document.getElementById('success-response');
            
            // UI Feedback
            button.disabled = true;
            button.innerHTML = '<svg class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Sending...';

            const formData = new FormData(form);
            const object = Object.fromEntries(formData.entries());
            const json = JSON.stringify(object);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: json
            })
            .then(async (response) => {
                if (response.status == 200) {
                    formContent.classList.add('hidden');
                    successResponse.classList.remove('hidden');
                } else {
                    alert("Something went wrong. Please try again.");
                    resetButton();
                }
            })
            .catch(error => {
                console.log(error);
                alert("Error submitting form.");
                resetButton();
            });

            function resetButton() {
                button.disabled = false;
                button.innerHTML = 'Send Message';
            }
        });
    </script>
</x-layouts.app>