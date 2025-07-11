<div class="border p-4 rounded">
    <h2>{{ $ad->title }}</h2>
    <p>{{ $ad->description }}</p>
    <p>{{ $formattedPrice() }}</p>

    @if ($showActions())
        <a href="{{ route('profile.ads.edit', $ad) }}">Edit</a>

        <form method="POST" action="{{ route('profile.ads.destroy', $ad) }}"
            onclick="return confirm('Are you sure you want to delete this ad?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif
</div>
