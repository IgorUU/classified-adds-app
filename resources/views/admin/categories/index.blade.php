@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Categories
    </h1>

    {{-- <div class="flex justify-center mb-6">
        <a href="{{ route('category.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
            ➕ New Category
        </a>
    </div> --}}

    <div class="space-y-4">
        @foreach ($categories as $category)
        <x-category-card :category="$category" />
        @endforeach
    </div>
</div>

{{ $categories->links() }}
@endsection
