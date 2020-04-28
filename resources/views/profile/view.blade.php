@extends('layout.basic')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
        <div class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
            @if(isset($user->full_name))
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        Name
                    </label>
                    {{ $user->full_name }}
                </div>
            @endif
            @if(isset($user->phone_number))
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                        Phone number
                    </label>
                    {{ $user->phone_number }}
                </div>
            @endif
            @if(isset($user->birth_date))
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">
                        Birth date
                    </label>
                    <div class="flex">
                        {{ $user->birth_date }}
                    </div>
                </div>
            @endif
            @if(isset($user->gender))
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender_id">
                    Gender
                </label>
                <div class="w-32">
                    {{ isset($user->gender) ? $user->gender->name : '' }}
                </div>
            </div>
            @endif
        </div>
@endsection
