@extends('layouts.app')

@section('content')
<h1
    class="text-4xl font-extrabold mb-6 text-center text-gray-800 tracking-wide">
    New category
</h1>

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
    <form method="POST"
        action="{{ route('admin.categories.store') }}"
        enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="flex flex-col items-center">
            <label for="name" class="font-medium">Name:</label>
            <input name="name" placeholder="Name"
                value="{{ old('name') }}"
                class="border rounded px-3 py-2 w-64">
        </div>

        <div class="flex flex-col items-center">
            <label for="parent_id" class="font-medium">Parent category:</label>
            <select name="parent_id" class="border rounded px-3 py-2">
                <option value="">-- None --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center gap-4 mt-4">
            <x-primary-button type="submit">Save</x-primary-button>
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
