<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Partner') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add a new partner image to the home partner.') }}
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
                @if (isset($partner))
                    <form action="{{ route('partner.update', ['partner' => $partner->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                            @method('post')
                @endif
                @csrf


                <div class="form-group">
                    <label for="slider" class="block mb-2 text-sm font-medium ">{{ __('Select Slider') }}</label>
                    <select id="slider" name="slider" required
                        class="border border-gray-300  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option>{{ __('Sliders') }}</option>
                        <option {{ isset($partner) && $partner->slider == '0' ? 'selected' : '' }} value="0">
                            {{ __('First Group') }}</option>
                        <option {{ isset($partner) && $partner->slider == '1' ? 'selected' : '' }} value="1">
                            {{ __('Second Group') }}</option>
                    </select>
                </div>
                <br />

                @if (isset($partner))
                    <img src="{{ asset('storage/' . $partner->image) }}" width="400">
                @endif
                <br />
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
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
