<a href="{{ route('ad.show', $ad) }}">
    <div class="bg-white shadow-md rounded-lg p-4 mb-4 flex flex-col md:flex-row gap-4">
        @if ($ad->image)
        <img src="{{ asset('storage/' . $ad->image) }}"
            alt="{{ $ad->title }}"
            class="w-full md:w-48 h-32 object-cover rounded">
        @endif

        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-800">{{ $ad->title }}</h2>
            <p class="text-gray-600">{{ $ad->description }}</p>
            <p class="text-lg font-semibold text-indigo-600 mt-2">{{ number_format($ad->price, 2) }} RSD</p>
        </div>
    </div>
</a>
