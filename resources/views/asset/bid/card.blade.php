<div class="h-10 h-auto min-h-95 mb-2 flex flex-col md:flex-row shadow">
     <div class="p-2 w-1/3">
         <span class="text-3xl text-red-700 uppercase">{{ $bid->cost }}</span><br>
         <a class="text-red-700 hover:text-black" href="{{ route('profile.view', $bid->user->id) }}">{{ $bid->user->full_name }}</a>
     </div>
     <div class="w-full">
         <div class="text-right mr-3">
             @if($user->bids->contains($bid))
                 <form method="post" action="{{ route('ad.bid.destroy') }}">
                     @csrf
                     <input name="id" value="{{ $bid->id }}" hidden>
                     <button type="submit" class="text-sm hover:text-red-500">Delete</button>
                 </form>
             @endif
             @if($user->ads->contains($ad))
                 @unless($ad->bid_id == $bid->id)
                     <form method="post" action="{{ route('ad.bid.hire') }}">
                         @csrf
                         <input name="bid_id" value="{{ $bid->id }}" hidden>
                         <input name="ad_id" value="{{ $ad->id }}" hidden>
                         <button type="submit" class="text-sm hover:text-red-500">Hire</button>
                     </form>
                 @endunless
             @endif
             @if(isset($ad->bid_id))
                 <span>Hired</span>
             @endif
         </div>
         <span class="text-lg mb-5">{{ $bid->body }}</span><br>
     </div>
 </div>
