@extends('layout.basic')
@section('content')
    @include('asset.cv.list', [$cvs, $user])
    <div class="flex-row">
        <div class="w-full text-center mb-5">
            @if(!$cvs->count())
                <span class="text-lg">You have no CVs. Create one now!</span>
            @endif
        </div>
        <div class="w-full text-center">
            @include('asset.button.important', ['link' => route('cv.create'), 'title' => 'Create new CV'])
        </div>
    </div>
@endsection
