@extends('layouts.app')

@section('content')
<h1>All Ads</h1>

@foreach ($ads as $ad)
<div>
  <a href="{{ route('ad.show', $ad) }}">{{ $ad->title }}</a>
  <p>Category: <a href="{{ route('category.show', $ad->category) }}">{{ $ad->category->name }}</a></p>
  <p>Posted by: {{ $ad->user->name }}</p>
</div>
@endforeach

{{ $ads->links() }}
@endsection
