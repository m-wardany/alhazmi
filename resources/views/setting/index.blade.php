<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Info') }}
        </h2>
    </x-slot>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Contact Info') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage Contact Info.') }}
            </p>
        </header>
    </section>
    <section>
        <x-primary-link :href="route('setting.create')">
            {{ __('Update Contact Info') }}
        </x-primary-link>
        <br />
        <br />
        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full ">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>{{ __('Contact Type') }}</th>
                        <th>{{ __('Value') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr class="bg-white border-b ">
                            <td>
                                {{ __(ucwords(str_replace('_', ' ', $setting->key))) }}
                            </td>
                            <td>
                                {{ $setting->value }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
