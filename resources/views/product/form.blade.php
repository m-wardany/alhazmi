<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create Product') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add a new product.') }}
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

                @if (isset($product))
                    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @method('post')
                @endif
                @csrf
                <div>
                    <x-input-label for="ar_name" :value="__('Ar_name')" />
                    <x-text-input id="ar_name" name="ar_name" type="text" class="mt-1 block w-full"
                        :value="old('ar_name', isset($product) ? $product->ar_name : '')" required autofocus autocomplete="ar_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('ar_name')" />
                </div>
                <br />
                <div>
                    <x-input-label for="en_name" :value="__('En_name')" />
                    <x-text-input id="en_name" name="en_name" type="text" class="mt-1 block w-full"
                        :value="old('en_name', isset($product) ? $product->en_name : '')" required autofocus autocomplete="en_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('en_name')" />
                </div>
                <br />

                <div class="form-group">
                    @if (isset($product))
                        <img src="{{ asset('storage/' . $product->image) }}" width="400">
                    @endif
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
