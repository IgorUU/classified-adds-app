@foreach ($ads as $ad)
  {{ $ad->title }} - {{ $ad->user->name }} - {{ $ad->category->name }}
@endforeach

{{ $ads->links() }} {{-- pagination links --}}
