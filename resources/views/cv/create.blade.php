@extends('layout.basic')
@section('content')
    <form method="post" action="{{ route('cv.store') }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Title
            </label>

            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" maxlength="255" value="{{ old('name') }}" autocomplete="name" autofocus>
            @error('name')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="introduction">
                Introduction
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="introduction" type="text" name="introduction" rows="30" maxlength="10000">{{ old('introduction') }}</textarea>
            @error('introduction')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="qualification">
                Qualification
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="qualification" type="text" name="qualification" rows="30" maxlength="10000">{{ old('qualification') }}</textarea>
            @error('qualification')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Create', 'parameters' => 'float-right'])
    </form>
@endsection
