@extends('pages.layout')

@section('content')
@include('pages.leading.layouts.header')

<section class=" py-20 mx-10">
    <div class="mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center py-8 mx-auto lg:py-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Contact Us</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">
                We use an agile approach to test assumptions and connect with the needs of your audience early and often.
            </p>
        </div>

        <div class="grid py-24 lg:grid-cols-2 gap-12">

            {{-- LEFT : FORM --}}
            <div class="bg-white p-4 rounded-2xl shadow-sm">
                <form class="space-y-6">

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" placeholder="Bonnie"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" placeholder="Green"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Your email</label>
                            <input type="email" placeholder="name@company.com"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="text" placeholder="+12 345 6789"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Your message</label>
                        <textarea rows="5" placeholder="Leave a comment..."
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"></textarea>
                    </div>

                    <p class="text-sm text-gray-500 leading-relaxed">
                        By submitting this form you agree to our
                        <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>
                        and our
                        <a href="#" class="text-blue-600 hover:underline">privacy policy</a>.
                    </p>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg shadow-sm transition">
                        Send message
                    </button>
                </form>
            </div>

            {{-- RIGHT : COMPANY INFO --}}
            <div class="bg-white p-4 rounded-2xl shadow-sm space-y-10">

                {{-- Company --}}
                <div class="flex items-start gap-5">
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"></path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-lg text-gray-900 mb-1">Company information</h4>
                        <p class="text-gray-600">Themesberg LLC</p>
                        <p class="text-gray-600">Tax id: USXXXXXX</p>
                    </div>
                </div>

                {{-- Address --}}
                <div class="flex items-start gap-5">
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 21c-4-4-6-7-6-10a6 6 0 1112 0c0 3-2 6-6 10z"></path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-lg text-gray-900 mb-1">Address</h4>
                        <p class="text-gray-600">SILVER LAKE, United States</p>
                        <p class="text-gray-600">1941 Late Avenue</p>
                        <p class="text-gray-600">Zip Code/Post code: 03875</p>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="flex items-start gap-5">
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 16.92V21a1 1 0 01-1.09 1A19.79 19.79 0 013 5.09 1 1 0 014 4h4.09a1 1 0 011 .75l1 4.09a1 1 0 01-.27.91l-2.2 2.2a16 16 0 006.92 6.92l2.2-2.2a1 1 0 01.91-.27l4.09 1a1 1 0 01.75 1z"/>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-lg text-gray-900 mb-1">Call us</h4>
                        <p class="text-gray-600">Call us to speak to a member of our team.</p>
                        <p class="text-gray-600">We are always happy to help.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('pages.leading.layouts.footer')
@endsection
