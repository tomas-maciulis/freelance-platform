@extends('layout.basic')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
    <form class="w-full p-2" action="/discover" method="GET">
        <input class="w-1/3 md:w-1/4 h-8 border-gray-300 border-2" placeholder="Name" type="text" id="name" name="name" value="{{ app('request')->input('name') }}">
        <input class="h-8 p-1 float-right md:float-none w-20 bg-gray-250 hover:bg-gray-300 rounded" type="submit" value="Filter">
    </form>
    @include('asset.profile.discover.list', $users)
@endsection
