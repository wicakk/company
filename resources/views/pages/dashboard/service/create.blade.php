@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6">
            <h2 class="font-semibold text-xl">Add Content</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('service.store') }}" class="flex gap-8">
                @csrf

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md" />
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="old('foto')" required
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    {{-- <div class="mt-4">
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title')" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subtitle" :value="__('subtitle')" />
                        <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle"
                            :value="old('subtitle')" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    </div> --}}

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('nama')" />
                        <x-text-area id="nama" class="block mt-1 w-full" type="text"
                            name="nama">{{ old('nama') }}</x-text-area>
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subnama" :value="__('subnama')" />
                        <x-text-area id="subnama" class="block mt-1 w-full" type="text"
                            name="subnama">{{ old('subnama') }}</x-text-area>
                        <x-input-error :messages="$errors->get('subnama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                            :value="old('price')" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('description')" />
                        <x-text-area id="description" class="block mt-1 w-full" type="text"
                            name="description">{{ old('description') }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="billing_period" :value="__('billing_period')" />
                        <x-text-area id="billing_period" class="block mt-1 w-full" type="text"
                            name="billing_period">{{ old('billing_period') }}</x-text-area>
                        <x-input-error :messages="$errors->get('billing_period')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </div>

@endsection