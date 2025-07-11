@extends('layouts.app')

@section('content')
    <h1>{{ $ad->title }}</h1>

    <p>Category: <a href="{{ route('category.show', $ad->category) }}">{{ $ad->category->name }}</a></p>
    <p>Posted by: {{ $ad->user->name }}</p>
    <p>Description: {{ $ad->description }}</p>

    @can('update', $ad)
        <a href="{{ route('profile.ads.edit', $ad) }}">Edit</a>

        <form method="POST" action="{{ route('profile.ads.destroy', $ad) }}"
        onclick="return confirm('Are you sure you want to delete this ad?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endcan
@endsection
