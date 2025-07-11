@extends('layouts.app')

@section('content')
<h1>My ads</h1>

<a href="{{ route('profile.ads.create') }}">New ad</a>
@foreach ($ads as $ad)
<div>
  <h2>{{ $ad->title }}</h2>
  <p>Description: {{ $ad->description }}</p>
  <p>Price {{ $ad->price }} RSD</p>
  <a href="{{ route('profile.ads.edit', $ad) }}">Edit</a>

  <form method="POST" action="{{ route('profile.ads.destroy', $ad) }}" onclick="return confirm('Are you sure you want to delete this ad?')">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>

</div>

@endforeach
@endsection
