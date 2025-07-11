@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-center">Edit Ad</h1>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 text-red-700 rounded max-w-md mx-auto">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="max-w-md mx-auto bg-white p-6 shadow rounded space-y-4">
    <form method="POST" action="{{ route('profile.ads.update', $ad) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="flex flex-col items-center">
            <label for="title" class="font-medium">Title:</label>
            <input name="title" placeholder="Title" value="{{ old('title', $ad->title) }}"
                class="border rounded px-3 py-2 w-64">
        </div>

        <div class="flex flex-col items-center mb-4 mt-4">
            <label for="description" class="font-medium">Description:</label>
            <textarea name="description" placeholder="Ad description"
                class="border rounded px-3 py-2 w-64">{{ old('description', $ad->description) }}</textarea>
        </div>

        @if ($ad->image)
            <div class="flex flex-col items-center">
                <img
                    src="{{ asset('storage/' . $ad->image) }}"
                    alt="Ad image"
                    width="450"
                    height="auto"
                    style="width: 450px; height: auto;"
                    class="rounded shadow">
            </div>
        @endif

        <div class="flex flex-col items-center">
            <label for="image" class="font-medium">Change Image:</label>
            <input type="file" name="image" class="w-64">
        </div>

        <div class="flex flex-col items-center">
            <span class="font-medium">Condition:</span>
            <div class="flex gap-4">
                <label><input type="radio" name="condition" value="new" {{ old('condition', $ad->condition) == 'new' ? 'checked' : '' }}> New</label>
                <label><input type="radio" name="condition" value="used" {{ old('condition', $ad->condition) == 'used' ? 'checked' : '' }}> Used</label>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <label for="category_id" class="font-medium">Category:</label>
            <select name="category_id" class="border rounded px-3 py-2 w-64">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $ad->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col items-center">
            <label for="price" class="font-medium">Price:</label>
            <input type="number" step="0.01" name="price" placeholder="Price" value="{{ old('price', $ad->price) }}"
                class="border rounded px-3 py-2 w-64">
        </div>

        <div class="flex flex-col items-center">
            <label for="location" class="font-medium">Location:</label>
            <input type="text" name="location" value="{{ old('location', $ad->location) }}"
                class="border rounded px-3 py-2 w-64">
        </div>

        <div class="flex flex-col items-center">
            <label for="phone" class="font-medium">Phone number:</label>
            <input type="tel" name="phone" placeholder="+381 123 4567" value="{{ old('phone', $ad->phone) }}"
                class="border rounded px-3 py-2 w-64">
        </div>

        <div class="flex justify-center gap-4 mt-4">
            <x-primary-button type="submit">Save changes</x-primary-button>
            <a href="{{ route('profile.ads.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
