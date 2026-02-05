@extends('layouts.app') @section('content')
    <x-common.page-breadcrumb pageTitle="Team Members" />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif
        <div class="mt-6"> <a href="{{ route('teams.create') }}"> <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-md font-semibold shadow"> + Add
                    Team Member </button> </a> </div>
        <div class="grid md:grid-cols-3 grid-cols-1 mt-6 gap-6">
            @foreach ($teams as $team)
                <div class="bg-white rounded-xl shadow border p-5 flex flex-col"> {{-- FOTO --}} <img
                        src="{{ $team->photo ? asset('storage/' . $team->photo) : 'https://api.dicebear.com/7.x/initials/svg?seed=' . $team->first_name }}"
                        class="h-48 w-full object-cover rounded-lg mb-4" /> {{-- NAMA --}} <h3
                        class="text-lg font-bold text-gray-800"> {{ $team->first_name }} {{ $team->last_name }} </h3>
                    {{-- EMAIL --}} @if ($team->email)
                        <p class="text-sm text-gray-500">{{ $team->email }}</p>
                        @endif {{-- BIO --}} @if ($team->bio)
                            <p class="text-sm text-gray-600 mt-2 line-clamp-3">{{ $team->bio }}</p>
                        @endif {{-- SOSIAL --}} <div class="flex gap-3 mt-3">
                            @if ($team->linkedin)
                                <a href="{{ $team->linkedin }}" target="_blank"
                                    class="text-blue-700 text-sm font-medium">LinkedIn</a>
                                @endif @if ($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank"
                                        class="text-pink-600 text-sm font-medium">Instagram</a>
                                @endif
                        </div> {{-- ACTION BUTTONS --}} <div class="flex gap-2 mt-5"> 
                            <button
                                @click="$dispatch('open-team-info-modal')"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white w-full py-2 rounded-md text-sm font-semibold">
                                 Edit 
                            </button>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="w-full"
                                onsubmit="return confirm('Yakin mau hapus member ini?')"> @csrf @method('DELETE')
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white w-full py-2 rounded-md text-sm font-semibold">
                                    Delete </button>
                            </form>
                        </div>
                </div>
            
        </div> <x-ui.modal x-data="{ open: false }" @open-team-info-modal.window="open = true" :isOpen="false"
            class="max-w-[700px]">
            <div
                class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
                <div class="px-2 pr-14">
                    <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90"> Edit Personal Information
                    </h4>
                    <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7"> Update your details to keep your
                        team up-to-date. </p>
                </div>
                <form action="{{ route('pages.teams.update', $team->id) }}" method="POST" class="flex flex-col">
                    @csrf @method('PUT') <div class="custom-scrollbar h-[458px] overflow-y-auto p-2">
                        <div>
                            <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6"> Social Links
                            </h5>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                                <div> <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Linkedin </label> <input type="text" value="{{ $team->linkedin }}"
                                        name="linkedin"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                                <div> <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Instagram </label> <input type="text" value="{{ $team->instagram }}"
                                        name="instagram"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-7">
                            <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6"> Personal
                                Information </h5>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                                <div class="col-span-2 lg:col-span-1"> <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"> First
                                        Name </label> <input type="text" name="first_name"
                                        value="{{ $team->first_name }}"
                                        class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                                <div class="col-span-2 lg:col-span-1"> <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"> Last
                                        Name </label> <input type="text" name="last_name" value="{{ $team->last_name }}"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                                <div class="col-span-2 lg:col-span-1"> <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"> Email
                                        Address </label> <input type="text" name="email" value="{{ $team->email }}"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                                <div class="col-span-2 lg:col-span-1"> <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"> Phone
                                    </label> <input type="text" name="phone" value="{{ $team->phone }}"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                                <div class="col-span-2" value="bio"> <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"> Bio
                                    </label> <input type="text" name="bio" value="{{ $team->bio }}"
                                        class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>
                            </div>
                            <div class="mt-7">
                                <h5 class="mb-5 text-lg font-medium text-gray-800 dark:text-white/90 lg:mb-6"> Personal
                                    Information </h5>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-5 lg:grid-cols-2">
                                    <div value="city"> <label
                                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            City/State </label> <input type="text" name="city"
                                            value="{{ $team->city }}"
                                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    </div>
                                    <div value="code"> <label
                                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Postal Code </label> <input type="text" name="code"
                                            value="{{ $team->code }}"
                                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    </div>
                                    <div value="tax"> <label
                                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            TAX ID </label> <input type="text" name="tax"
                                            value="{{ $team->tax }}"
                                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    </div>
                                    <div value="country"> <label
                                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Country </label> <input type="text" name="country"
                                            value="{{ $team->country }}"
                                            class="dark:bg-dark-900 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end"> <button @click="open = false"
                            type="button"
                            class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                            Close </button> <button type="submit"
                            class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
                            Save Changes </button> </div>
                </form>
            </div>
        </x-ui.modal>
        <div class="mt-6"> {{ $teams->links() }} </div>
    </div>
    @endforeach
@endsection
