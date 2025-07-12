<a href="{{ route('profile.edit', $user) }}">
  <div class="bg-white shadow-md rounded-lg p-4 mb-4 flex flex-col md:flex-row gap-4">
    @if ($user->image)
    <img src="{{ asset('storage/' . $ad->image) }}"
      alt="{{ $ad->title }}"
      class="w-full md:w-48 h-32 object-cover rounded">
    @endif

    <div class="flex-1">
      <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
      <p class="text-gray-600">{{ $user->email }}</p>
    </div>
  </div>
</a>
