@extends('layout.basic')
@section('content')
    <span class="text-2xl">{{ $ad->title }}</span>
    @include('asset.ad.price', [
        $ad,
        'parameters' => 'text-center sm:w-1/2 md:w-1/3 lg:w-1/4'
    ])
    <div class="flex justify-center mb-3">
        <a href="{{ route('profile.view', $ad->user->id) }}" class="text-gray-500 text-md flex-1 hover:text-red-500">{{ $ad->user->full_name }}</a>
        <span class="text-gray-500 text-md flex-1 text-right">Ends in {{ $ad->created_at->addDays($ad->active_for)->diffForHumans() }}</span>
    </div>
    <div>
        <span>{{ $ad->body }}</span>
    </div>
@endsection
