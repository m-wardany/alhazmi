<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Social Media') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Create socialmedia') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add a new Social Media link.') }}
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

                @if (isset($socialmedia))
                    <form action="{{ route('socialmedia.update', ['socialmedia' => $socialmedia->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('socialmedia.store') }}" method="POST" enctype="multipart/form-data">
                            @method('post')
                @endif
                @csrf
                <div>
                    <x-input-label for="url" :value="__('Url')" />
                    <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                        :value="old('url', isset($socialmedia) ? $socialmedia->url : '')" required autofocus autocomplete="url" />
                    <x-input-error class="mt-2" :messages="$errors->get('url')" />
                </div>
                <br />

                <div class="form-group">
                    @if (isset($socialmedia))
                        <img src="{{ asset('storage/' . $socialmedia->image) }}" width="400">
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
