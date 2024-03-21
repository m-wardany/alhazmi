<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info') }}
        </h2>
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Content') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Update website content.') }}
            </p>
        </header>
        <form method="post" action="{{ route('info.update', ['info' => $info->language]) }}" class="mt-6 space-y-6">
            @csrf
            @method('post')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <x-text-input id="language" name="language" type="hidden" class="mt-1 block w-full" :value="old('language', $info->language)" />
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div>
                        <x-input-label for="about" :value="__('About')" />
                        <x-text-area id="about" name="about" type="text" class="mt-1 block w-full"
                            :value="old('about', $info->about)" required autofocus autocomplete="about" />
                        <x-input-error class="mt-2" :messages="$errors->get('about')" />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div>
                        <x-input-label for="vesion" :value="__('Vesion')" />
                        <x-text-input id="vesion" name="vesion" type="text" class="mt-1 block w-full"
                            :value="old('vesion', $info->vesion)" required autofocus autocomplete="vesion" />
                        <x-input-error class="mt-2" :messages="$errors->get('vesion')" />
                    </div>

                    <div>
                        <x-input-label for="message" :value="__('Message')" />
                        <x-text-input id="message" name="message" type="text" class="mt-1 block w-full"
                            :value="old('message', $info->message)" required autofocus autocomplete="message" />
                        <x-input-error class="mt-2" :messages="$errors->get('message')" />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div>
                        <x-input-label for="value_professional" :value="__('Value Professional')" />
                        <x-text-input id="value_professional" name="value_professional" type="text"
                            class="mt-1 block w-full" :value="old('value_professional', $info->value_professional)" required autofocus
                            autocomplete="value_professional" />
                        <x-input-error class="mt-2" :messages="$errors->get('value_professional')" />
                    </div>

                    <div>
                        <x-input-label for="value_innovation" :value="__('Value Innovation')" />
                        <x-text-input id="value_innovation" name="value_innovation" type="text"
                            class="mt-1 block w-full" :value="old('value_innovation', $info->value_innovation)" required autofocus
                            autocomplete="value_innovation" />
                        <x-input-error class="mt-2" :messages="$errors->get('value_innovation')" />
                    </div>

                    <div>
                        <x-input-label for="value_quality" :value="__('Value Quality')" />
                        <x-text-input id="value_quality" name="value_quality" type="text" class="mt-1 block w-full"
                            :value="old('value_quality', $info->value_quality)" required autofocus autocomplete="value_quality" />
                        <x-input-error class="mt-2" :messages="$errors->get('value_quality')" />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div>
                        <x-input-label for="duty_customer" :value="__('duty_customer')" />
                        <x-text-input id="duty_customer" name="duty_customer" type="text" class="mt-1 block w-full"
                            :value="old('duty_customer', $info->duty_customer)" required autofocus autocomplete="duty_customer" />
                        <x-input-error class="mt-2" :messages="$errors->get('duty_customer')" />
                    </div>

                    <div>
                        <x-input-label for="duty_products" :value="__('duty_products')" />
                        <x-text-input id="duty_products" name="duty_products" type="text" class="mt-1 block w-full"
                            :value="old('duty_products', $info->duty_products)" required autofocus autocomplete="duty_products" />
                        <x-input-error class="mt-2" :messages="$errors->get('duty_products')" />
                    </div>

                    <div>
                        <x-input-label for="duty_markets" :value="__('duty_markets')" />
                        <x-text-input id="duty_markets" name="duty_markets" type="text" class="mt-1 block w-full"
                            :value="old('duty_markets', $info->duty_markets)" required autofocus autocomplete="duty_markets" />
                        <x-input-error class="mt-2" :messages="$errors->get('duty_markets')" />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="columns-2">
                        @for ($i = 1; $i <= 8; $i++)
                            @php
                                $title = 'goals_' . $i . '_title';
                                $body = 'goals_' . $i . '_body';
                            @endphp
                            <div class="relative">
                                <x-input-label for="{{ $title }}" :value="__($title)" />
                                <x-text-input id="{{ $title }}" name="{{ $title }}" type="text"
                                    class="mt-1 block w-full" :value="old('{{ $title }}', $info->$title)" required autofocus
                                    autocomplete="{{ $title }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('{{ $title }}')" />
                            </div>
                            <div class="relative">
                                <x-input-label for="{{ $body }}" :value="__($body)" />
                                <x-text-input id="{{ $body }}" name="{{ $body }}" type="text"
                                    class="mt-1 block w-full" :value="old('{{ $body }}', $info->$body)" required autofocus
                                    autocomplete="{{ $body }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('{{ $body }}')" />
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <div>
                        <x-input-label for="team" :value="__('team')" />
                        <x-text-input id="team" name="team" type="text" class="mt-1 block w-full"
                            :value="old('team', $info->team)" required autofocus autocomplete="team" />
                        <x-input-error class="mt-2" :messages="$errors->get('team')" />
                    </div>

                    <div>
                        <x-input-label for="responsibilities" :value="__('responsibilities')" />
                        <x-text-input id="responsibilities" name="responsibilities" type="text"
                            class="mt-1 block w-full" :value="old('responsibilities', $info->responsibilities)" required autofocus
                            autocomplete="responsibilities" />
                        <x-input-error class="mt-2" :messages="$errors->get('responsibilities')" />
                    </div>

                    <div>
                        <x-input-label for="integrity" :value="__('integrity')" />
                        <x-text-input id="integrity" name="integrity" type="text" class="mt-1 block w-full"
                            :value="old('integrity', $info->integrity)" required autofocus autocomplete="integrity" />
                        <x-input-error class="mt-2" :messages="$errors->get('integrity')" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>
    </section>

</x-app-layout>
