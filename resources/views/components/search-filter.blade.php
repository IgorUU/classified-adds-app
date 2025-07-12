<div>
    <form method="GET" action="{{ route('home') }}"></form>
        <label for="title_description">Ad</label>
        <input type="text" name="title_description">
        <label for="price">Price</label>
        <!-- Get price chunks dynamically from ad prices.
        Get the minimum and maximum price and then create chunks. -->
        <select name="price">
            <option value="">-- None --</option>
            <option value="0-1000">0 - 1000</option>
            <option value="1000-3000">1000 - 3000</option>
            <option value="3000">over 3000</option>
        </select>
        <label for="location">Location</label>
        <input type="text" name="location" />
        <label for="category">Category</label>
        <select name="category">
            <option value="">-- None --</option>
            @foreach ($categories as $category)
            <option value="{{ old('category'), $category->id }}">{{ $category->name
                }}</option>
            @endforeach
        </select>
        <x-primary-button type="submit">Search</x-primary-button>
    </form>
</div>
