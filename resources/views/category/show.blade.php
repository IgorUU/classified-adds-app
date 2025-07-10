@extends('layouts.app')

@section('content')
<h1>Ads in Category: {{ $category->name }}</h1>

@foreach ($ads as $ad)
<div>
  <a href="{{ route('ad.show', $ad) }}">{{ $ad->title }}</a>
  <p>Posted by: {{ $ad->user->name }}</p>
</div>
@endforeach

{{ $ads->links() }}
@endsection
