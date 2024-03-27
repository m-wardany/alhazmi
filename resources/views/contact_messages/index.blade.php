<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact us messages') }}
        </h2>
    </x-slot>

    <section>
        <div class="relative
            overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full " id="sortable-table">
                <thead>
                    <tr class="bg-white border-b  dark:border-gray-700">
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr class="bg-white border-b ">
                            <td> {{ $message->name }}</td>
                            <td> {{ $message->email }}</td>
                            <td> {{ $message->created_at }}</td>

                            <td>

                                <a href="{{ route('contactus.show', $message) }}">{{ __('View') }}</a>
                                |
                                <form action="{{ route('contactus.destroy', $message) }}" method="POST"
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
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $messages->links() !!}
            </div>
        </div>
    </section>
</x-app-layout>
