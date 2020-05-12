@extends('layout.basic')
@section('content')
    <form method="post" action="{{ route('work.store', request()->route()->parameters['id']) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_url">
                Url
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_url" type="text" name="product_url" maxlength="255" value="{{ old('product_url') ?? $ad->product_url }}" autofocus>
            @error('product_url')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_instructions">
                Introduction
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_instructions" type="text" name="product_instructions" rows="30" maxlength="10000">{{ old('product_instructions') ?? $ad->product_instructions }}</textarea>
            @error('product_instructions')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Deliver', 'parameters' => 'float-right'])
    </form>
@endsection
