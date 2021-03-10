<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mecanix') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&display=swap" rel="stylesheet">
        
        <!-- File upload -->
        <link href="{{ asset('css/filepond.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/filepond-plugin-image-preview.css') }}" rel="stylesheet" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body>
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

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
                {{ $slot }}
            </main>
        </div>

        @include('shared.footer')

        @stack('modals')

        @livewireScripts
        
        <script src="{{ asset('js/dist/filepond-plugin-file-metadata.js') }}"></script>
        <script src="{{ asset('js/dist/filepond-plugin-image-crop.js') }}"></script>
        
        <script src="{{ asset('js/dist/filepond-plugin-image-preview.js') }}"></script>
        <script src="{{ asset('js/dist/filepond.js') }}"></script>
        <script src="{{ asset('js/filepond.js') }}"></script>
        <!-- Turn all file input elements into ponds -->
        <script>
            FilePond.parse(document.body);
        </script>
        <script src="{{ asset('js/custom-filepond.js') }}"></script>

        <script>
            feather.replace()
        </script>

    </body>
</html>
