@extends('layout.basic')
@section('content')
    @include('home.ad.search', $adCategories)
    @include('home.ad.list', $ads)
@endsection
