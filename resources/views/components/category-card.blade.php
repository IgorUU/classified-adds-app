<a href="{{ route('admin.categories.edit', $category) }}">
    <div
        class="bg-white shadow-md rounded-lg p-4 mb-4 flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-800">{{ $category->name }}
            </h2>
        </div>
    </div>
</a>
