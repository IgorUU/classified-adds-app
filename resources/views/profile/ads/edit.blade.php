@extends('layouts.app')

@section('content')
    <h1>Edit Ad</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="red">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('profile.ads.update', $ad) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <br>
        <input name="title" placeholder="Title" value="{{ old('title', $ad->title) }}">
        <br><br>
        <label for="description">Description:</label>
        <br>
        <textarea name="description" placeholder="Ad description">{{ old('description', $ad->description) }}</textarea>
        <br>
        @if ($ad->image)
            <img src="{{ asset('storage/' . $ad->image) }}" alt="Ad image" width="200">
        @endif
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <label for="condition">Condition:</label>
        <br>
        <label><input type="radio" name="condition" value="new" {{ old('condition', $ad->condition) == 'new' ? 'checked' : ''}}>New</label>
        <label><input type="radio" name="condition" value="used" {{ old('condition', $ad->condition) == 'used' ? 'checked' : ''}}>Used</label>
        <br>
        <label for="category_id">Category:</label>
        <br>
        <select name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $ad->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="price">Price:</label>
        <br>
        <input type="number" step="0.01" name="price" placeholder="Price" value="{{ old('price', $ad->price) }}"><br>
        <br>
        <label for="location">Location:</label>
        <br>
        <input type="text" name="location" value="{{ old('location', $ad->location) }}">
        <br>
        <label for="phone">Phone number:</label>
        <br>
        <input type="tel" name="phone" placeholder="+381 123 4567" value="{{ old('phone', $ad->phone) }}">
        <br><br>
        <button type="submit">Save changes</button>
        <a href="{{ route('profile.ads.index') }}"
            class="inline-block px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 ml-2">
            Cancel
        </a>
    </form>
@endsection
