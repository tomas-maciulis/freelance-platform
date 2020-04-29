@foreach($experiences as $experience)
    @include('asset.cv.experience.card', [$experience])
@endforeach
