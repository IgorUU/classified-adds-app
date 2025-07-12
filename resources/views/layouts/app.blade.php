<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles - Custom CSS -->
    <!-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>

        <!-- Change this to be sidebar section -->
        <div class="flex">
            <aside class="w-64 bg-gray-100 p-4 border">
                <h2 class="text-2xl font-bold mb-4">Categories</h2>
                <ul class="space-y-2">
                    @foreach ($sidebarCategories as $category)
                    <li>
                        <a href="{{ route('category.show', $category) }}" class="text-blue-900">
                            {{ $category->name }}
                        </a>

                        @if ($category->children->count())
                        <ul class="ml-4 mt-1 space-y-1">
                            @foreach ($category->children as $child)
                            <li>
                                <a href="{{ route('category.show', $child) }}"
                                    class="text-sm text-blue-500">
                                    {{ $child->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </aside>

            <!-- Page Content -->
            <main class="ml-64">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>
