@extends('layout.basic')
@section('content')
    @include('asset.ad.search', $adCategories)
    @include('asset.ad.list', $ads)
@endsection
