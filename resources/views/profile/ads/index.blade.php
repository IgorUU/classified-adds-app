@extends('layouts.app')

@section('content')
<h1>My ads</h1>

<a href="{{ route('profile.ads.create') }}">New ad</a>
@endsection
