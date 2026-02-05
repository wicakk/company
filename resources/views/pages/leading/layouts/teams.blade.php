@extends('pages.layout')

@section('content')
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <!-- Heading -->
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet the Team</h2>
            <p class="text-gray-500 max-w-2xl mx-auto mb-14">
                With over 8 years of combined experience, we've got a well-seasoned
                team at the BlockSAFU.
            </p>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

                @foreach ($teams as $team)
                    <div class="flex flex-col items-center">
                        <img src="{{ $team->photo
                            ? asset('storage/' . $team->photo)
                            : 'https://api.dicebear.com/7.x/initials/svg?seed=' . $team->first_name }}"
                            class="w-32 h-32 rounded-full border border-gray-200 shadow-sm mb-4 object-cover" />


                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $team->name }}
                        </h3>

                        <p class="text-gray-500 text-sm mb-3">
                            {{ $team->position }}
                        </p>

                        @if ($team->telegram)
                            <a href="{{ $team->telegram }}" target="_blank"
                                class="w-9 h-9 flex items-center justify-center rounded-full bg-black text-white hover:scale-110 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9.993 15.674l-.398 4.418c.57 0 .817-.245 1.115-.538l2.672-2.56 5.54 4.05c1.015.56 1.74.267 1.994-.94l3.616-16.94c.297-1.386-.5-1.93-1.49-1.56L1.41 9.47c-1.36.53-1.34 1.29-.23 1.63l5.69 1.78 13.21-8.32c.62-.4 1.19-.18.72.22" />
                                </svg>
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
