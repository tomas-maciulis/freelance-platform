<a href="#">
    <div class="h-10 hover:bg-gray-150 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow hover:shadow-md overflow-visible">
        <div class="p-2 md:w-2/3 w-full">
            <span class="text-lg text-red-700 uppercase">{{ $ad->title }}</span><br>
        </div>
        <div class="relative w-1/2 sm:w-2/6 lg:w-1/4">
            <div class="h-8 p-1 mb-4 mt-2 bg-green-200 text-center">
                <span class="m-2 font-bold">{{ floor($ad->price_floor) }}-{{ floor($ad->price_ceiling) }} €/h</span>
            </div>
            <span class="absolute bottom-0 m-1 text-gray-800">0 bids</span><br>
        </div>
        <div class="relative w-full md:w-1/4">
            <div class="absolute bottom-0 right-0 p-1 md:w-full md:text-center">
                <span class="m-2 text-xs text-gray-600">{{ $ad->created_at->diffForHumans() }}</span><br>
                <span class="m-2 text-xs text-gray-600">{{ $ad->created_at->addDays($ad->active_for)->diffForHumans() }}</span><br>
            </div>
        </div>
    </div>
</a>
