@foreach($cvs as $cv)
    @include('asset.cv.card', [$cv, $user])
@endforeach
