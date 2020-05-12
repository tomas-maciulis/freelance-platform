@foreach($users as $user)
    @include('asset.profile.discover.card', $user)
@endforeach
