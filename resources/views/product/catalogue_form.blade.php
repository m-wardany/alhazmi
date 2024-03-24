<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalogue') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update catalogue') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Update catalogue Url.') }}
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


                <form action="{{ route('update.catalogue') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                        @if (!empty($catalogue->value))
                            <x-primary-link :href="route('download.catalogue')">
                                {{ __('Download Catalogue') }}
                            </x-primary-link>
                        @else
                            {{ __('No file uploaded yet!') }}
                        @endif
                        <br />
                        <br />
                        <label for="catalogue">Catalogue</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <br />
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
