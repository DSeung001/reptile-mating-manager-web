<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        @include('parts.favicon')

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href='{{asset("style/common.css")}}'/>

        <!-- Styles -->
        <livewire:styles />

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ES784GV65G"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-ES784GV65G');
        </script>

        @stack('styles')
    </head>
    <body class="font-sans antialiased min-h-screen">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                            {{$header}}
                        </h3>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('footer')
        </div>

        {{-- 추후 변경--}}
        <script>
            @if (session('message'))
                alert("{{ session('message') }}");
            @endif
        </script>

        <livewire:scripts />

        @stack('modals')
        @stack('scripts')

        <script src="{{asset("js/flowbite.js")}}"></script>
    </body>
</html>
