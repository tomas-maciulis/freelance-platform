@foreach($ads as $ad)
    @include('asset.ad.card', [$ad, $user])
@endforeach
<div class="flex justify-center">
    @unless(isset($noPagination) ? $noPagination : False)
        {{ $ads->links() }}
    @endunless
</div>
