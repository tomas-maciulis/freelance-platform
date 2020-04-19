@extends('layout.basic')
@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <form method="post" action="{{ route('ad.store') }}">
        @csrf
        <input class="w-full h-8 border-gray-300 border-2 mb-3" placeholder="Title" type="text" id="title" name="title" value="{{ old('title')}}">
        <select class="w-full border-gray-300 border-2 bg-white mb-3" id="work_category_id" name="work_category_id">
            <option value="">Category</option>
            @foreach($workCategories as $workCategory)
                <option value="{{ $workCategory->id }}" @if($workCategory->id == old('work_category_id')) selected @endif>{{ $workCategory->name }}</option>
            @endforeach
        </select>
        <select class="w-full border-gray-300 border-2 bg-white mb-3" id="active_for" name="active_for">
            <option value="">Days active</option>
            @for($i = 1; $i <= 30; $i++)
                <option value="{{ $i }}" @if($i == old('active_for')) selected @endif>{{ $i }}</option>
            @endfor
        </select>
        <input class="w-2/5 h-8 border-gray-300 border-2 mx-0 px-0 mb-3" placeholder="Price floor (€/h)" type="text" id="price_floor" name="price_floor" value="{{ old('price_floor')}}">
        <input class="float-right w-1/2 h-8 border-gray-300 border-2 mb-3" placeholder="Price ceiling (€/h)" type="text" id="price_ceiling" name="price_ceiling" value="{{ old('price_ceiling')}}">
        <textarea class="w-full border-gray-300 border-2 bg-white mb-3 resize-none" placeholder="Descriptiom" rows="20" id="body" name="body" >{{ old('body') }}</textarea>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Submit'])
    </form>
@endsection
