<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Product Images') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage product Images.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('product.create')">
            {{ __('Add a new product') }}
        </x-primary-link>
        <x-primary-link :href="route('edit.catalogue')">
            {{ __('Update Catalogue') }}
        </x-primary-link>
        <x-primary-button id="save-button" disabled data-model="Product">
            {{ __('Sort') }}
        </x-primary-button>
        <br />
        <br />
        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full" id="sortable-table">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b" data-id="{{ $product->id }}">
                            <td>
                                {{ $product->ar_name }}
                            </td>
                            <td>
                                {{ $product->en_name }}
                            </td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('product.edit', $product) }}">Edit</a>
                                |
                                <form action="{{ route('product.destroy', $product) }}" method="POST"
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
