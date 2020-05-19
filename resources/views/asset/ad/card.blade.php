<a href="{{ route('ad.view', $ad->id) }}">
    <div class="h-10 hover:bg-gray-150 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow hover:shadow-md overflow-visible">
        <div class="p-2 md:w-2/3 w-full">
            <span class="text-lg text-red-700 uppercase">{{ $ad->title }}</span><br>
        </div>
        <div class="relative w-1/2 sm:w-2/6 lg:w-1/4">
            @include('asset.ad.price', [$ad])
            <span class="absolute bottom-0 m-1 text-gray-800">Bids: {{ isset($ad->bids) ? $ad->bids->count() : 0 }}</span><br>
        </div>
        <div class="relative w-full md:w-1/4">
            <div class="absolute bottom-0 right-0 p-1 md:w-full md:text-center">
                @auth
                    @if($user->rememberedAds->contains($ad->id))
                        <form method="post" action="{{ route('ad.forget', $ad->id) }}">
                            @csrf
                            <button type="submit" class="text-sm hover:text-red-500">Forget</button>
                        </form>
                    @else
                        @unless($ad->user->id == $user->id)
                            <form method="post" action="{{ route('ad.remember', $ad->id) }}">
                                @csrf
                                <button type="submit" class="text-sm hover:text-red-500">Save</button>
                            </form>
                        @else
                            <form method="post" action="{{ route('ad.delete', $ad->id) }}" onsubmit="return confirm('Are you sure you want to delete ad?');">
                                @csrf
                                <button type="submit" class="text-sm hover:text-red-500">Delete</button>
                            </form>
                        @endunless
                    @endif
                @endauth
{{--                TODO: make it compatible with remembered ads list--}}
{{--                <span class="m-2 text-xs text-gray-600">Ends in {{ $ad->created_at->addDays($ad->active_for)->diffForHumans() }}</span><br>--}}
            </div>
        </div>
    </div>
</a>
