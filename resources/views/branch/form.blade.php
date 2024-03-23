<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<!-- original: http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Branch') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Branch') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add a new branch.') }}
            </p>
        </header>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($branch))
                    <form action="{{ route('branch.update', ['branch' => $branch->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data">
                            @method('post')
                @endif
                @csrf
                <div>
                    <x-input-label for="ar_name" :value="__('Ar_name')" />
                    <x-text-input id="ar_name" name="ar_name" type="text" class="mt-1 block w-full"
                        :value="old('ar_name', isset($branch) ? $branch->ar_name : '')" required autofocus autocomplete="ar_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('ar_name')" />
                </div>
                <br />
                <div>
                    <x-input-label for="en_name" :value="__('En_name')" />
                    <x-text-input id="en_name" name="en_name" type="text" class="mt-1 block w-full"
                        :value="old('en_name', isset($branch) ? $branch->en_name : '')" required autofocus autocomplete="en_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('en_name')" />
                </div>
                <br />
                <div>
                    <x-input-label for="ar_address" :value="__('Ar_address')" />
                    <x-text-input id="ar_address" name="ar_address" type="text" class="mt-1 block w-full"
                        :value="old('ar_address', isset($branch) ? $branch->ar_address : '')" required autofocus autocomplete="ar_address" />
                    <x-input-error class="mt-2" :messages="$errors->get('ar_address')" />
                </div>
                <br />
                <div>
                    <x-input-label for="en_address" :value="__('En_address')" />
                    <x-text-input id="en_address" name="en_address" type="text" class="mt-1 block w-full"
                        :value="old('en_address', isset($branch) ? $branch->en_address : '')" required autofocus autocomplete="en_address" />
                    <x-input-error class="mt-2" :messages="$errors->get('en_address')" />
                </div>
                <br />
                <div>
                    <x-input-label for="phone_numbers" :value="__('Phone_numbers')" />
                    <x-text-input id="phone_numbers" name="phone_numbers" type="text" class="mt-1 block w-full"
                        :value="old('phone_numbers', isset($branch) ? $branch->phone_numbers : '')" autofocus autocomplete="phone_numbers" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone_numbers')" />
                </div>
                <br />
                <div>
                    <x-input-label for="mobile_numbers" :value="__('Mobile_numbers')" />
                    <x-text-input id="mobile_numbers" name="mobile_numbers" type="text" class="mt-1 block w-full"
                        :value="old('mobile_numbers', isset($branch) ? $branch->mobile_numbers : '')" autofocus autocomplete="mobile_numbers" />
                    <x-input-error class="mt-2" :messages="$errors->get('mobile_numbers')" />
                </div>
                <br />
                <div>
                    <x-input-label for="location" :value="__('Location Coordinates(lat, long)')" />
                    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                        :value="old('location', isset($branch) ? $branch->location : '')" required autofocus autocomplete="location" />
                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                </div>
                <br />

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
