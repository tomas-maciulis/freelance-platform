@extends('layout.basic')
@section('content')
    @include('asset.ad.list', [$ads, $user, 'noPagination' => True])
@endsection
