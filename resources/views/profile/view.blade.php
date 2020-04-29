@extends('layout.basic')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
    @include('asset.profile.details', [$user])
@endsection
