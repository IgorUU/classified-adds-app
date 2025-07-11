@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-center">Create New Ad</h1>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 text-red-700 rounded max-w-lg mx-auto">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="max-w-lg mx-auto bg-white p-6 shadow rounded">
    <form method="POST" action="{{ route('profile.ads.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="flex flex-col items-center">
            <label for="title" class="block font-medium">Title:</label>
            <input name="title" placeholder="Title" value="{{ old('title') }}"
                class="border rounded px-3 py-2">
        </div>

        <div class="flex flex-col items-center">
            <label for="description" class="block font-medium">Description:</label>
            <textarea name="description" placeholder="Ad description"
                class="border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="flex flex-col items-center">
            <label for="image" class="block font-medium">Image:</label>
            <input type="file" name="image" class="block">
        </div>

        <div class="flex flex-col items-center">
            <span class="block font-medium">Condition:</span>
            <label class="inline-flex items-center">
                <input type="radio" name="condition" value="new" class="mr-1">
                New
            </label>
            <label class="inline-flex items-center ml-4">
                <input type="radio" name="condition" value="used" class="mr-1">
                Used
            </label>
        </div>

        <div class="flex flex-col items-center">
            <label for="category_id" class="block font-medium">Category:</label>
            <select name="category_id" class="border rounded px-3 py-2">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col items-center">
            <label for="price" class="block font-medium">Price:</label>
            <input type="number" step="0.01" name="price" placeholder="Price" value="{{ old('price') }}"
                class="border rounded px-3 py-2">
        </div>

        <div class="flex flex-col items-center">
            <label for="location" class="block font-medium">Location:</label>
            <input type="text" name="location" value="{{ old('location') }}"
                class="border rounded px-3 py-2">
        </div>

        <div class="flex flex-col items-center">
            <label for="phone" class="block font-medium">Phone number:</label>
            <input type="tel" name="phone" placeholder="+381 123 4567" value="{{ old('phone') }}"
                class=" border rounded px-3 py-2">
        </div>

        <div class="flex justify-center mt-6 gap-2">
            <x-primary-button type="submit">Save</x-primary-button>
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
