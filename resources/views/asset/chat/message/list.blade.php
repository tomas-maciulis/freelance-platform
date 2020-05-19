@if($messages->count() === 0)
    <div class="text-center">
        <span class="text-lg">There are no messages yet.</span>
    </div>
@else
    @foreach($messages as $message)
        @if($message->sender_user_id == $user->id)
            @include('asset.chat.message.sender', $message)
        @else
            @include('asset.chat.message.recipient', $message)
        @endif
    @endforeach
@endif
