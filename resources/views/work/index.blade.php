@extends('layout.basic')

@section('content')
    @include('asset.ad.list', [$ads, 'noPagination' => True])
@endsection
