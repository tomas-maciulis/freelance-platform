@foreach($bids as $bid)
    @include('asset.bid.card', [$bid, $user])
@endforeach
