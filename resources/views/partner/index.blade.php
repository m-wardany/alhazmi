<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Partner') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Partner Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage partner Images.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('partner.create')">
            {{ __('Add a new partner') }}
        </x-primary-link>
        <x-primary-button id="save-button" disabled data-model="Partner">
            {{ __('Sort') }}
        </x-primary-button>
        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full " id="sortable-table">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>{{ __('Slider') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $partner)
                        <tr class="bg-white border-b " data-id="{{ $partner->id }}">
                            <td> {{ $partner->slider + 1 }}
                            </td>
                            <td>
                                @if ($partner->image)
                                    <img src="{{ asset('storage/' . $partner->image) }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('partner.edit', $partner) }}">Edit</a>
                                |
                                <form action="{{ route('partner.destroy', $partner) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-delete-button />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
