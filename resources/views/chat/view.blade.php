@extends('layout.basic')
@section('content')
    @include('asset.chat.message.list', [$messages, $user])
    <form method="post" action="{{ route('message.store', request()->route()->parameters['id']) }}" class="bg-white w-full px-8 pt-6 pb-8 mb-4 relative">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                Message
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" type="text" name="body" maxlength="10000" autofocus> {{ old('body') }} </textarea>
            @error('body')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Send', 'parameters' => 'float-right'])
    </form>
@endsection
