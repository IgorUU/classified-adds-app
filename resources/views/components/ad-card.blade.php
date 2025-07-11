<a href="{{ route('ad.show', $ad) }}" class="block border p-4 rounded hover:bg-gray-50">
    <h2>{{ $ad->title }}</h2>
    <p>{{ $ad->description }}</p>
    <p>{{ $formattedPrice() }}</p>
</a>
