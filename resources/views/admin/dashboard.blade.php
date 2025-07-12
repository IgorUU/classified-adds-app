@extends('layouts.app')
@section('header')
    <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="py-32">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-32">
        <div
            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2
                class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">
                Admin Dashboard</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('admin.ads.index') }}"
                    class="block bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-lg transition p-6 text-center">
                    <div
                        class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        Ads</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                        Manage all ads</div>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="block bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-lg transition p-6 text-center">
                    <div
                        class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        Users</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                        Manage users</div>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                    class="block bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-lg transition p-6 text-center">
                    <div
                        class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        Categories</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                        Manage categories</div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
