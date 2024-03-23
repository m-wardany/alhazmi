<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Branch') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Branch Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage branches.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('branch.create')" :active="request()->routeIs('branch/*')">
            {{ __('Add a new branch') }}
        </x-primary-link>

        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full ">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>{{ __('Arabic Name') }}</th>
                        <th>{{ __('English Name') }}</th>
                        <th>{{ __('Arabic Address') }}</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        <tr class="bg-white border-b ">
                            <td>
                                {{ $branch->ar_name }}
                            </td>
                            <td>
                                {{ $branch->en_name }}
                            </td>
                            <td>
                                {{ $branch->ar_address }}
                            </td>
                            <td>

                                <a href="{{ route('branch.edit', $branch) }}">Edit</a>
                                |
                                <form action="{{ route('branch.destroy', $branch) }}" method="POST"
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
