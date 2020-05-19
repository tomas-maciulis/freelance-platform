<div class="flex">
    <div class="w-1/2"></div>
    <div class="bg-red-700 p-3 m-3 text-right rounded-lg w-1/2">
        <div class="text-right">
            <span class="text-lg text-white">
                {{ $message->sender->full_name }}
            </span>
        </div>
        <span class="text-white">
            {{ $message->body }}
        </span><br>
        <span class="text-xs text-gray-400">
            {{ $message->created_at }}
        </span>
     </div>
</div>
