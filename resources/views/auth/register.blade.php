@extends('layout.minimal')

@section('content')
<div class="w-full max-w-xs m-auto mt-10">
    <form method="post" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input id="password" type="password" name="password" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" required autocomplete="new-password">
        </div>
        @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Confirm password
            </label>
            <input id="password-confirm" type="password" name="password_confirmation" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" required autocomplete="new-password">
        </div>
        <div class="flex items-center justify-between">
            @include('asset.button.regular', ['link' => env('APP_URL'), 'title' => 'Back'])
            @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Register'])
        </div>
        <div class="text-right absolute bottom-0 mb-2 mr-2">
            <span class="text-red-500 text-xs">Already have an account?</span>
            <a href="{{ route('login') }}" class="text-red-500 font-bold text-sm hover:text-black">Login</a>
        </div>
    </form>
</div>
@endsection
