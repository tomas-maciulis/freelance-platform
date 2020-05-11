@extends('layout.basic')
@section('content')
    <form method="post" action="{{ route('cv.education.store', $cv->id) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <input name="cv_id" value="{{ $cv->id }}" hidden>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Education Provider
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="education_provider" type="text" name="education_provider" maxlength="255" value="{{ old('education_provider') }}" autocomplete="name" autofocus>
            @error('education_provider')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Specialty
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="specialty" type="text" name="specialty" maxlength="255" value="{{ old('specialty') }}" autocomplete="specialty" autofocus>
            @error('specialty')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="education_degree_id">
                Education degree
            </label>
            <select class="shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="education_degree_id" type="number" name="education_degree_id" autocomplete="education_degree_id" autofocus>
                <option value="">----</option>
                @foreach($educationDegrees as $educationDegree)
                    <option value="{{ $educationDegree->id }}" @if(old('education_degree_id') == $educationDegree->id) selected  @endif>{{ $educationDegree->name }}</option>
                @endforeach
            </select>
            @error('education_degree_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Add education', 'parameters' => 'float-right'])
    </form>
@endsection
