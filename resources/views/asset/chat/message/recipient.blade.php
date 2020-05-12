<div class="flex">
    <div class="bg-gray-300 p-3 m-3 text-left w-1/2 rounded-lg">
        <div class="text-left">
            <span class="text-lg text-black">
                {{ $message->sender->full_name }}
            </span>
        </div>
        <span class="text-black">
            {{ $message->body }}
        </span><br>
        <span class="text-xs text-gray-600">
            {{ $message->created_at }}
        </span>
    </div>
    <div class="w-1/2"></div>
</div>
