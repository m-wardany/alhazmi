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
                {{ __('Update Contact Info.') }}
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

                <form action="{{ route('setting.store') }}" method="POST">
                    @method('post')
                    @csrf

                    <div>
                        <x-input-label for="contact_phones" :value="__('Contact Phones')" />
                        <x-text-input id="contact_phones" name="contact_phones" type="text" class="mt-1 block w-full"
                            :value="old('contact_phones', $contactPhones->value)" autofocus autocomplete="contact_phones" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_phones')" />
                    </div>
                    <br />
                    <div>
                        <x-input-label for="contact_mobiles" :value="__('Contact Mobiles')" />
                        <x-text-input id="contact_mobiles" name="contact_mobiles" type="text"
                            class="mt-1 block w-full" :value="old('contact_mobiles', $contactMobiles->value)" autofocus autocomplete="contact_mobiles" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_mobiles')" />
                    </div>
                    <br />
                    <div>
                        <x-input-label for="contact_fax" :value="__('Contact Fax')" />
                        <x-text-input id="contact_fax" name="contact_fax" type="text" class="mt-1 block w-full"
                            :value="old('contact_fax', $contactFax->value)" autofocus autocomplete="contact_fax" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_fax')" />
                    </div>
                    <br />
                    <div>
                        <x-input-label for="contact_emails" :value="__('Contact Emails')" />
                        <x-text-input id="contact_emails" name="contact_emails" type="text" class="mt-1 block w-full"
                            :value="old('contact_emails', $contactEmails->value)" autofocus autocomplete="contact_emails" />
                        <x-input-error class="mt-2" :messages="$errors->get('contact_emails')" />
                    </div>
                    <br />
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
