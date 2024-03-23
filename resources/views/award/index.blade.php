<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Awards') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Award Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage award Images.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('award.create')" :active="request()->routeIs('award/*')">
            {{ __('Add a new award') }}
        </x-primary-link>

        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full ">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($awards as $award)
                        <tr class="bg-white border-b ">
                            <td>
                                {{ $award->ar_name }}
                            </td>
                            <td>
                                {{ $award->en_name }}
                            </td>
                            <td>
                                @if ($award->image)
                                    <img src="{{ asset('storage/' . $award->image) }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('award.edit', $award) }}">Edit</a>
                                |
                                <form action="{{ route('award.destroy', $award) }}" method="POST"
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
