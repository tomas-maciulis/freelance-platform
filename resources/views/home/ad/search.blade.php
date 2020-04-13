<div class="flex-wrap h-40 md:h-32 bg-gray-150 mb-5">
    <span class="text-3xl p-2">Search</span>
    <form class="w-full p-2" action="/" method="GET">
        <select class="w-full mb-1 md:mb-0 md:w-1/3 h-8 border-gray-300 border-2 bg-white " id="caregory" name="category">
            <option value="">Category</option>
            @foreach($adCategories as $adCategory)
                <option value="{{ $adCategory->id }}" @if(app('request')->input('category') == $adCategory->id) selected @endif>{{ $adCategory->name }}</option>
            @endforeach
        </select>
        <input class="w-1/3 md:w-1/4 h-8 border-gray-300 border-2" placeholder="Minimum €/h" type="text" id="min_cost" name="min_pay" value="{{ app('request')->input('min_pay') }}">
        <input class="w-1/3 md:w-1/4 h-8 border-gray-300 border-2" placeholder="Keyword" type="text" id="keyword" name="keyword" value="{{ app('request')->input('keyword') }}">
        <input class="h-8 p-1 float-right md:float-none w-20 bg-gray-250 hover:bg-gray-300 rounded" type="submit" value="Filter">
    </form>
        @if(app('request')->request->count())
            <div class="text-center">
                <a class="text-red-700 hover:text-black" href="{{ route('home') }}">Clear filter</a>
            </div>
        @endif
</div>
