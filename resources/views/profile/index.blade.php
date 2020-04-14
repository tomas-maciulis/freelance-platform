@extends('layout.basic')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
        <form method="post" action="{{ route('profile.update') }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
            @csrf
{{--            TODO: email update--}}
{{--            TODO: fill form with submitted data if validator fails instead of current data--}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" type="text" name="first_name" value="{{ $profile->first_name }}" autocomplete="first_name" autofocus>
                @error('first_name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" type="text" name="last_name" value="{{ $profile->last_name }}" autocomplete="last_name" autofocus>
                @error('last_name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                    Phone number
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" type="text" name="phone_number" value="{{ $profile->phone_number }}" autocomplete="phone_number" autofocus>
                @error('phone_number')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">
                    Birth date
                </label>
                <div class="flex">
                    <div class="w-24">
                        <select class="shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="birth_year" type="number" name="birth_year" autocomplete="birth_year" autofocus>
                            <option value="">----</option>
                            @foreach($years as $year)
{{--                                TODO: move date checking logic to the controller--}}
                                <option value="{{ $year }}" @if($year === ($profile->birth_date ? $profile->birth_date->year : '')) selected @endif>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-16 ml-2">
                        <select class="shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="birth_month" type="number" name="birth_month" autocomplete="birth_month" autofocus>
                            <option value="">--</option>
                            @foreach($months as $month)
                                <option value="{{ $month }}" @if($month === ($profile->birth_date ? $profile->birth_date->month : '')) selected @endif>{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-16 ml-2">
                        <select class="shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="birth_day" type="number" name="birth_day" autocomplete="birth_day" autofocus>
                            <option value="">--</option>
                            @foreach($days as $day)
                                <option value="{{ $day }}" @if($day === ($profile->birth_date ? $profile->birth_date->day : '')) selected @endif>{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('birth_date')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender_id">
                    Gender
                </label>
                <div class="w-32">
                    <select class="capitalize shadow appearance-none border bg-white rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " id="gender_id" name="gender_id" autocomplete="gender_id" autofocus>
                        @foreach($genders as $gender)
                            <option class="capitalize" value="{{ $gender->id }}" @if($gender->id === $profile->gender_id) selected @endif>{{ $gender->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Update', 'parameters' => 'float-right'])
        </form>
@endsection
