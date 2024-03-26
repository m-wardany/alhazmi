<x-mail::message>
    # A new contact Message from: {{ $name }} ({{ $email }})

    {{ $message }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
