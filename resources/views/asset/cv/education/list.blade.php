@foreach($educations as $education)
    @include('asset.cv.education.card', [$education])
@endforeach
