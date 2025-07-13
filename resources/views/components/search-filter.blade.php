<form method="GET" action="{{ route('home') }}" class="space-y-4">

    <!-- Ad -->
    <div class="flex items-center gap-4">
        <div>
            <label for="title_description"
                class="block text-sm font-medium">Ad</label>
            <input type="text" name="title_description"
                value="{{ request('title_description') }}"
                class=" border rounded px-3 py-2 w-48">
        </div>

        <!-- Price -->
        <div class="flex-1">
            <label for="price" class="block text-sm font-medium">Price</label>

            <div class="flex items-center gap-2">
                <span id="min-label"
                    class="text-xs text-gray-600 w-16 text-right mr-4"></span>
                <div id="price-slider" data-min="{{ $minPrice }}"
                    data-max="{{ $maxPrice }}" class="flex-1"></div>
                <span id="max-label"
                    class="text-xs text-gray-600 w-16 text-left ml-4"></span>
            </div>
            <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min', $minPrice) }}">
            <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max', $maxPrice) }}">
        </div>
    </div>

    <!-- Location & category -->
    <div class="flex items-center gap-4">
        <div>
            <label for="location"
                class="block text-sm font-medium">Location</label>
            <input type="text" name="location" value="{{ request('location') }}"
                class="border rounded px-3 py-2 w-48">
        </div>

        <div>
            <label for="category"
                class="block text-sm font-medium">Category</label>
            <select name="category" class="border rounded px-3 py-2 w-48">
                <option value="">-- None --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <x-primary-button type="submit">Search</x-primary-button>
</form>
