@extends('layouts.app')

@section('content')
    <h1>My ads</h1>

    <a href="{{ route('profile.ads.create') }}">New ad</a>
    @foreach ($ads as $ad)
        <x-ad-card :ad="$ad" />
    @endforeach
@endsection
