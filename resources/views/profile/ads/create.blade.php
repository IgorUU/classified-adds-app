@extends('layouts.app')

@section('content')
<h1>Create New Ad</h1>

@if ($errors->any())
<div>
  @foreach ($errors->all() as $error)
  <p class="red">{{ $error }}</p>
  @endforeach
</div>
@endif

<form method="POST" action="{{ route('profile.ads.store') }}" enctype="multipart/form-data">
  @csrf
  <label for="title">Title:</label>
  <br>
  <input name="title" placeholder="Title" value="{{ old('title') }}">
  <br><br>
  <label for="description">Description:</label>
  <br>
  <textarea name="description" placeholder="Ad description">{{ old('description') }}</textarea>
  <br>
  <label for="image">Image:</label>
  <input type="file" name="image">
  <br>
  <label for="condition">Condition:</label>
  <br>
  <label><input type="radio" name="condition" value="new">New</label>
  <label><input type="radio" name="condition" value="used">Used</label>
  <br>
  <label for="category_id">Category:</label>
  <br>
  <select name="category_id">
    @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
  </select>
  <br>
  <label for="price">Price:</label>
  <br>
  <input type="number" step="0.01" name="price" placeholder="Price" value="{{ old('price') }}"><br>
  <br>
  <label for="location">Location:</label>
  <br>
  <input type="text" name="location" value="{{ old('location') }}">
  <br>
  <label for="phone">Phone number:</label>
  <br>
  <input type="tel" name="phone" placeholder="+381 123 4567" value="{{ old('phone') }}">
  <br><br>
  <button type="submit">Save</button>
</form>
@endsection
