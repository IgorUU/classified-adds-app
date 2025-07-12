@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
  {{ __('Edit User') }}
</h2>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
      <div class="max-w-xl">

        @if ($errors->any())
        <div class="mb-4 text-red-600">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
          @csrf
          @method("PUT")

          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text" required autofocus
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              value="{{ old('name', $user->name) }}">
          </div>

          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              value="{{ old('email', $user->email) }}">
          </div>

          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          </div>

          <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          </div>

          <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
              <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
          </div>

          <div>
            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700">
              Save
            </button>
          </div>
        </form>


        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
          onclick="return confirm('Are you sure you want to delete this user? You are going to delete all of his ads also.')">
          @csrf
          @method('DELETE')
          <x-danger-button type="submit">Delete User</x-danger-button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
