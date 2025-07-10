@extends('layouts.app')

@section('content')
<h1>{{ $ad->title }}</h1>

<p>Category: <a href="{{ route('category.show', $ad->category) }}">{{ $ad->category->name }}</a></p>
<p>Posted by: {{ $ad->user->name }}</p>
<p>Description: {{ $ad->description }}</p>
@endsection
