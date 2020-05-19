<div class="h-10 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow overflow-visible">
     <div class="p-2 w-full">
         <span class="text-lg text-red-700 uppercase">{{ $education->specialty }}</span><br>
     </div>
     <div class="w-full">
         <div class="text-right mr-3">
             {{--                TODO: fix routes not to duplicate use all ids in GET and POST methods--}}
             <form method="post" action="{{ route('cv.education.destroy', ['id' => $cv->id, 'educationId' => $education->id]) }}" onsubmit="return confirm('Are you sure you want to delete education?');">
                 @csrf
                 <input name="cv_id" value="{{ $cv->id }}" hidden>
                 <input name="education_id" value="{{ $education->id }}" hidden>
                 <button type="submit" class="text-sm hover:text-red-500">Delete</button>
             </form>
         </div>
         <span class="text-lg mb-5">{{ $education->education_provider }}</span><br>
     </div>
 </div>
