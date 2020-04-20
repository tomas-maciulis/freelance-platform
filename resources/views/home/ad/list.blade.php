@foreach($ads as $ad)
    @include('home.ad.card', $ad)
@endforeach
<div class="flex justify-center">
    {{ $ads->links() }}
</div>
