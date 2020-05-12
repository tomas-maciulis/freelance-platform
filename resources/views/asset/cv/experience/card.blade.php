<div class="h-10 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow overflow-visible">
    <div class="p-2 w-3/5">
        <span class="text-lg text-red-700 uppercase">{{ $experience->occupation }}</span><br>
    </div>
    <div class="w-full">
        <div class="text-right mr-3">
            {{--                TODO: fix routes not to duplicate use all ids in GET and POST methods--}}
            <form method="post" action="{{ route('cv.experience.destroy', ['id' => $cv->id, 'experienceId' => $experience->id]) }}" onsubmit="return confirm('Are you sure you want to delete \'' + {{ $experience->occupation }} + '\' experience?');">
                @csrf
                <input name="cv_id" value="{{ $cv->id }}" hidden>
                <input name="job_experience_id" value="{{ $experience->id }}" hidden>
                <button type="submit" class="text-sm hover:text-red-500">Delete</button>
            </form>
        </div>
        <div class="p-2 w-1/3">
            <span>{{ $experience->employer }}</span><br>
            <span>{{ $experience->website }}</span><br>
            <span>{{ $experience->duration }}</span><br>
        </div>
        <div class="p-2 w-1/3">
            <span>{{ $experience->description }}</span>
        </div>
    </div>
</div>
