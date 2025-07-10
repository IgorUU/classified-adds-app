<x-app-layout>
  <div>
    @foreach($ads as $ad)
    <div class="ad">
      <div class="ad-message">
        <p>{{ $ad->message }}</p>
      </div>
      <div class="ad-footer">
        <div class="ad-user-name">
          <p class="ad-user-name-text">{{ $ad->user->name }}</p>
          <p class="created-at">{{ $ad->created_at->diffForHumans() }}
          </p>
        </div>
        <div class="ad-actions">
          <a href="{{ route('ads.edit', $ad) }}">Edit</a>
          <form action="{{ route('ads.destroy', $ad) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button"
              onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</x-app-layout>
