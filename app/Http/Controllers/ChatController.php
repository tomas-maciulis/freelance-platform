<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Bid;
use App\PrivateMessage;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    private function validateAccess($user, Ad $ad)
    {
        if ($user->ads->contains($ad)) {
            return 0;
        } elseif ($this->userRepository->getWork($user->id)->contains($ad)) {
            return 0;
        } else {
            return abort(403);
        }
    }

    private function validateMessage(array $data)
    {
        return Validator::make($data, [
            'body' => ['string', 'max:10000'],
        ]);
    }

    public function view(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();

        $this->validateAccess($user, $ad);

        return view('chat.view')
            ->with([
                'messages' => $ad->messages->take(50),
                'user' => $user,
            ]);
    }

    public function storeMessage(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();
        $requestData = $request->except('_token');
        $validator = $this->validateMessage($requestData);

        $this->validateAccess($user, $ad);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $senderId = $user->id;
        if ($ad->user->id === $user->id) {
            $recipientId = $ad->worker->id;
        } else {
            $recipientId = $ad->user->id;
        }

        $message = new PrivateMessage();
        $message->ad_id = $ad->id;
        $message->sender_user_id = $user->id;
        $message->recipient_user_id = $recipientId;
        $message->sender_user_id = $senderId;
        $message->body = $request->body;
        $message->save();

        return redirect()->back();
    }
}
