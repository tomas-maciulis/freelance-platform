@extends('layout.basic')
@section('content')
    @include('asset.ad.list', [$ads, $user, 'noPagination' => True])
    @unless($ads->count())
        <div class="text-center">
            <span class="text-lg">You don't have any saved ads.</span>
        </div>
    @endunless
@endsection
