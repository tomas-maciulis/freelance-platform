@extends('layout.basic')

@section('content')
    @include('asset.ad.list', [$ads, 'noPagination' => True])
    @if($ads->count() == 0)
        <div class="text-center">
            <span class="text-lg">You have no work yet.</span>
        </div>
    @endif
@endsection
