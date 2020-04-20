@extends('layout.basic')
@section('content')
    <span class="text-2xl">{{ $ad->title }}</span>
    @include('asset.ad.price', [
        $ad,
        'parameters' => 'text-center sm:w-1/2 md:w-1/3 lg:w-1/4'
    ])
    <div class="flex justify-center mb-3">
        <span class="text-gray-500 text-md flex-1">{{ $ad->user->full_name }}</span>
        <span class="text-gray-500 text-md flex-1 text-right">Ends {{ $ad->created_at->addDays($ad->active_for)->diffForHumans() }}</span>
    </div>
    <div>
        <span>{{ $ad->body }}</span>
    </div>
@endsection
