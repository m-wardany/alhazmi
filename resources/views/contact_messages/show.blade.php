<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact us messages') }}
        </h2>
    </x-slot>

    <section>
        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">
            <ul>
            </ul>
            <li> {{ $contactUs->name }}</li>
            <li> {{ $contactUs->email }}</li>
            <li>
                <p>{{ $contactUs->message }}</p>
            </li>
        </div>
        </div>
    </section>
</x-app-layout>
