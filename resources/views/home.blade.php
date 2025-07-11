@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto space-y-4">
        @foreach ($ads as $ad)
            <x-ad-card :ad="$ad" />
        @endforeach
    </div>

    <div class="mt-6 flex justify-center">
        {{ $ads->links() }}
    </div>
@endsection
