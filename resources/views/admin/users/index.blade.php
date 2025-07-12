@extends('layouts.app')

@section('content')
<x-alert type="error"></x-alert>
<x-alert type="success"></x-alert>

<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Users</h1>

    <div class="space-y-4">
        @foreach ($users as $user)
        <x-user-card :user="$user" />
        @endforeach
    </div>
</div>

{{ $users->links() }}
@endsection
