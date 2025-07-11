@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">{{ $category->name }}</h1>

    <div class="space-y-4">
        @foreach ($ads as $ad)
        <x-ad-card :ad="$ad" />
        @endforeach
    </div>
</div>
<div>
    {{ $ads->links() }}
</div>
@endsection
