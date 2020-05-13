@extends('layout.basic')
@section('content')
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_url">
            Url
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_url" type="text" name="product_url" maxlength="255" value="{{ old('product_url') ?? $ad->product_url }} " disabled>
        @error('product_url')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_instructions">
            Instruction
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_instructions" type="text" name="product_instructions" rows="15" maxlength="10000" disabled>{{ old('product_instructions') ?? $ad->product_instructions }}</textarea>
        @error('product_instructions')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    @unless($ad->review)
    <form method="post" action="{{ route('work.rate', request()->route()->parameters['id']) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="gender_id">
                Rating
            </label>
            <div class="w-32">
                <select class="capitalize shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="rating" name="rating">
                    @for($i=1;$i<=5;$i++)
                        <option value="{{ $i }}" @if($i == old('rating')) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                Comment
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" type="text" name="body" rows="15" maxlength="10000">{{ old('body') }}</textarea>
            @error('body')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Submit', 'parameters' => 'float-right'])
    </form>
    @endunless
@endsection
