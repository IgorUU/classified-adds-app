@extends('layouts.app')

@section('content')
    @foreach ($ads as $ad)
        <x-ad-card :ad="$ad" />
    @endforeach

    {{ $ads->links() }}
@endsection
