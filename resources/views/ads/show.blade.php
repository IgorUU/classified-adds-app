@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $ad->title }}</h1>

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Image -->
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $ad->image) }}" alt="Ad image" width="450"
                height="auto" style="width: 450px; height: auto;" class="rounded shadow">
        </div>

        <!-- Info + actions -->
        <div class="flex flex-col justify-between flex-1">
            <div class="space-y-2">
                <p><strong>Category:</strong>
                    <a href="{{ route('category.show', $ad->category) }}"
                        class="text-blue-600">
                        {{ $ad->category->name }}
                    </a>
                </p>
                <p><strong>Posted by:</strong> {{ $ad->user->name }}</p>
                <p><strong>Description:</strong> {{ $ad->description }}</p>
                <p><strong>Condition:</strong> {{ ucfirst($ad->condition) }} </p>
                <p><strong>Location:</strong> {{ $ad->location }}</p>
                <p><strong>Phone:</strong> {{ $ad->phone }}</p>
                <p><strong>Price:</strong></p><span class="text-lg font-semibold text-indigo-600 mt-2">{{ number_format($ad->price, 2) }} RSD</span>
            </div>

            @can('update', $ad)
            <div class="mt-4 flex gap-4">
                <a href="{{ route('profile.ads.edit', $ad) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit
                </a>

                <form method="POST"
                    action="{{ route('profile.ads.destroy', $ad) }}"
                    onclick="return confirm('Are you sure you want to delete this ad?')">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">Delete</x-danger-button>
                </form>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
