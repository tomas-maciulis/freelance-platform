@extends('layout.basic')
@section('content')
    <span class="text-2xl">Contact details</span>
    @include('asset.profile.details', [$user])

    <div class="mb-2 text-right px-3">
        @include('asset.button.important', ['title' => 'Edit profile', 'link' => route('profile.index')])
    </div>

    <span class="text-2xl">Introduction</span>
    <form method="post" action="{{ route('cv.update', $cv->id) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" maxlength="255" value="{{ old('name') ?? $cv->name }}" autocomplete="name" autofocus>
            @error('name')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="introduction">
                Introduction
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="introduction" type="text" name="introduction" autocomplete="last_name" rows="15" maxlength="10000">{{ old('introduction') ?? $cv->introduction }}</textarea>
            @error('introduction')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Update', 'parameters' => 'float-right'])
    </form>

    <span class="text-2xl">Education</span>
    <div>
{{--        TODO: Fix unless statement to show the message if there is no data. Currently it doesn't do that.--}}
        @unless(!$cv->educations)
            @include('asset.cv.education.list', ['educations' => $cv->educations])
        @else
            <span class="text-lg">You haven't added education yet</span>
        @endunless
        <div class="mb-2 pt-3 text-right px-3">
            @include('asset.button.important', ['title' => 'Add education', 'link' => route('cv.education.new', $cv->id)])
        </div>
    </div>

    <span class="text-2xl">Experience</span>
    <div>
        @unless(!$cv->jobExperiences)
            @include('asset.cv.experience.list', ['experiences' => $cv->jobExperiences])
        @else
            <span class="text-lg">You haven't added experience yet</span>
        @endunless
        <div class="mb-2 pt-3 text-right px-3">
            @include('asset.button.important', ['title' => 'Add experience', 'link' => route('cv.experience.new', $cv->id)])
        </div>
    </div>
@endsection
