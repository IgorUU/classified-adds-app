<a href="{{ route('category.show', $category) }}">
    <div
        class="bg-white shadow-md rounded-lg p-4 mb-4 flex flex-col md:flex-row gap-4">
        @if($category->image)
        <img src="{{ asset('storage/' . $category->image) }}"
            alt="{{ $category->title }}"
            class="w-full md:w-48 h-32 object-cover rounded" />
        @endif

        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-800">{{ $category->name }}
            </h2>
        </div>
    </div>
</a>
