@foreach($cvs as $cv)
    @include('asset.cv.card', [$cv, $user])
@endforeach
@if(!$cvs->count())
    <div class="flex justify-center">
        You have no CVs. Create one now!
    </div>
@endif
