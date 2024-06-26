<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preload" as="style" href="{{ asset('resources/css/app-1.css') }}">
    <link rel="modulepreload" href="{{ asset('resources/js/app.js') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/app-2.css') }}">
    <script type="module" src="{{ asset('resources/js/app-1.js') }}"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#sortable-1").sortable();
        });
        $(function() {
            // Enable sortable on the table
            $("#sortable-table tbody").sortable({
                update: function(event, ui) {
                    $("#save-button").prop("disabled", false);
                }
            });

            // Save button click event
            $("#save-button").click(function() {
                $(this).prop("disabled", true);

                // Get the sorted IDs
                var sortedIds = $("#sortable-table tbody tr").map(function() {
                    return $(this).data("id");
                }).get();
                // Send the sorted IDs via AJAX
                $.ajax({
                    url: "{{ route('sort') }}",
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        ids: sortedIds,
                        model: $(this).data('model')
                    }),
                    success: function(response) {
                        alert("Sort order saved successfully!");
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        alert("Error occurred while saving sort order.");
                        console.error(error);
                    },
                    complete: function() {
                        // Re-enable the save button
                        $("#save-button").prop("disabled", true);
                    }
                });
            });
        });
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>

</html>
