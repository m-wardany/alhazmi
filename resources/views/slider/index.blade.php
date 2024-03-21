<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Slider Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage slider Images.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('slider.create')" :active="request()->routeIs('slider/*')">
            {{ __('Add a new slider') }}
        </x-primary-link>

        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full ">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr class="bg-white border-b ">
                            <td>
                                @if ($slider->image)
                                    <img src="{{ asset('storage/' . $slider->image) }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('slider.edit', $slider) }}">Edit</a>
                                |
                                <form action="{{ route('slider.destroy', $slider) }}" method="POST"
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
