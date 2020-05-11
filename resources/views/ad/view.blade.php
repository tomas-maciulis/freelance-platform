@extends('layout.basic')
@section('content')
    <span class="text-2xl">{{ $ad->title }}</span>
    @include('asset.ad.price', [
        $ad,
        'parameters' => 'text-center sm:w-1/2 md:w-1/3 lg:w-1/4'
    ])
    <div class="flex justify-center mb-3">
        <a href="{{ route('profile.view', $ad->user->id) }}" class="text-gray-500 text-md flex-1 hover:text-red-500">{{ $ad->user->full_name }}</a>
        <span class="text-gray-500 text-md flex-1 text-right">Ends in {{ $ad->created_at->addDays($ad->active_for)->diffForHumans() }}</span>
    </div>
    <div>
        <span>{{ $ad->body }}</span>
    </div>

    <div class="mt-32">
        <span class="text-2xl">Bids</span>
        @auth
            @unless($user->ads->contains($ad) || isset($ad->bid_id))

    {{--            TODO: Move form to another file--}}
            <div class="mt-5">
                <span class="text-xl">New bid</span>
            </div>
                <form method="post" action="{{ route('ad.bid.store') }}" class="bg-white w-full px-8 pt-6 pb-8 mb-10 relative">
                    @csrf
                    <input name="ad_id" value="{{ $ad->id }}" hidden>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cost">
                            Cost
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cost" type="number" step="0.01" min="0" name="cost" maxlength="255" value="{{ old('cost') }}" autocomplete="cost" autofocus required>
                        @error('cost')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                            Message
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" type="text" name="body" autocomplete="body" rows="15" maxlength="10000" required>{{ old('body') }}</textarea>
                        @error('body')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @include('asset.form.button.important', ['type' => 'submit', 'title' => 'Add bid', 'parameters' => 'float-right'])
                </form>
            @endunless
        @endauth
        @unless($ad->bids->count() == 0)
            @include('asset.bid.list', ['bids' => $ad->bids->sortByDesc('created_at'), $user])
        @else
            <div class="text-center">
                <span class="text-lg">There are no bids yet.</span>
            </div>
        @endunless
    </div>

@endsection
