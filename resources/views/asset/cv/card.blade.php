<a href="{{ route('cv.edit', $cv->id) }}">
    <div class="h-10 hover:bg-gray-150 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow hover:shadow-md overflow-visible">
        <div class="p-2 md:w-2/3 w-full">
            <span class="text-lg text-red-700 uppercase">{{ $cv->name }}</span><br>
        </div>
        <div class="relative w-full md:w-1/4">
            <div class="absolute bottom-0 right-0 p-1 md:w-full md:text-center">
                @if($user->cvs->contains($cv->id))
                    <form method="post" action="{{ route('cv.destroy', $cv->id) }}" onsubmit="return confirm('Are you sure you want to delete CV?');">
                        <input name="cv_id" value="{{ $cv->id }}" hidden>
                        @csrf
                        <button type="submit" class="text-sm hover:text-red-500">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</a>
