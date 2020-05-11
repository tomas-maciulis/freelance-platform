@extends('layout.basic')
@section('content')
    <form method="post" action="{{ route('cv.experience.store', $cv->id) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <input name="cv_id" value="{{ $cv->id }}" hidden>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="employer">
                Employer
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="employer" type="text" name="employer" maxlength="255" value="{{ old('employer') }}" autocomplete="employer" autofocus>
            @error('employer')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="occupation">
                Occupation
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="occupation" type="text" name="occupation" maxlength="255" value="{{ old('occupation') }}" autocomplete="occupation" autofocus>
            @error('occupation')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
{{--        TODO: add marks for mandatory fields--}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="work_category_id">
                Work category
            </label>
            <select class="shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="work_category_id" type="number" name="work_category_id" autocomplete="work_category_id" autofocus>
                <option value="">----</option>
                @foreach($workCategories as $workCategory)
                    <option value="{{ $workCategory->id }}" @if(old('work_category_id') == $workCategory->id) selected @endif>{{ $workCategory->name }}</option>
                @endforeach
            </select>
            @error('work_category_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="duration">
                Duration
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="duration" type="text" name="duration" maxlength="255" value="{{ old('duration') }}" autocomplete="duration" autofocus>
            @error('duration')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="website">
                Website
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="website" type="text" name="website" maxlength="255" value="{{ old('website') }}" autocomplete="website" autofocus>
            @error('website')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" name="description" autocomplete="description" rows="30" maxlength="10000">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Add experience', 'parameters' => 'float-right'])
    </form>
@endsection
