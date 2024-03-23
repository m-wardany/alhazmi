<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SocialMedias') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('SocialMedia Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage SocialMedia Images.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('socialmedia.create')">
            {{ __('Add a new SocialMedia') }}
        </x-primary-link>

        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full ">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>English Name</th>
                        <th>Url</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socialmedias as $SocialMedia)
                        <tr class="bg-white border-b ">
                            <td>
                                {{ $SocialMedia->en_name }}
                            </td>
                            <td>
                                {{ $SocialMedia->url }}
                            </td>
                            <td>
                                @if ($SocialMedia->image)
                                    <img src="{{ asset('storage/' . $SocialMedia->image) }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('socialmedia.edit', $SocialMedia) }}">Edit</a>
                                |
                                <form action="{{ route('socialmedia.destroy', $SocialMedia) }}" method="POST"
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
