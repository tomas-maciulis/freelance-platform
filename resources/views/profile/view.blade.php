@extends('layout.basic')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
    @include('asset.profile.details', [$user])
{{--    TODO:Move to another file--}}
    @unless($reviews->count() == 0)
        <span class="text-3xl">Reviews</span>
        @foreach($reviews as $review)
            <div class="bg-gray-150">
                <span class="text-xl text-red-700">{{ $review->rating }}</span><br>
                <span class="text-md">{{ $review->user->full_name }}:</span>
                <span class="text-md italic">"{{ $review->body }}"</span>
            </div>
        @endforeach
    @endunless
@endsection
