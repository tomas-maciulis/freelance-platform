<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Repositories\UserRepository;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    private function deliveryValidator(array $data)
    {
        return Validator::make($data, [
            'product_url' => ['url', 'max:255'],
            'product_introductions' => ['string', 'max:10000'],
        ]);
    }

    private function ratingValidator(array $data)
    {
        return Validator::make($data, [
            'rating' => ['numeric', 'max:5', 'min:1'],
            'body' => ['string', 'max:10000'],
        ]);
    }

    private function validateAccess($user, Ad $ad)
    {
        if ($ad->worker->id == $user->id || $ad->user->id == $user->id) {
            return 0;
        } else {
            return abort('403');
        }
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $ads = $this->userRepository->getWork($user->id);

        return view('work.index')
            ->with([
                'ads' => $ads,
                'user' => $user,
            ]);
    }

    public function deliver(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();

        $this->validateAccess($user, $ad);

        return view('ad.deliver')
            ->with([
                'ad' => $ad,
            ]);
    }

    public function viewDelivery(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();

        $this->validateAccess($user, $ad);

        return view('ad.view-delivery')
            ->with([
                'ad' => $ad,
            ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();

        $this->validateAccess($user, $ad);

        $validator = $this->deliveryValidator($request->except('_token'));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ad->product_url = $request->product_url;
        $ad->product_instructions = $request->product_instructions;
        $ad->save();

        return redirect()->route('home');
    }

    public function storeRating(Request $request)
    {
        $user = Auth::user();
        $ad = Ad::where('id', $request->id)->firstOrFail();

        $this->validateAccess($user, $ad);

        $validator = $this->ratingValidator($request->except('_token'));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $review = new Review();
        $review->rating = $request->rating;
        $review->body = $request->body;
        $review->user_id = $user->id;
        $review->rated_user_id = $ad->worker->id;
        $review->ad_id = $ad->id;
        $review->save();

        return redirect()->route('home');
    }
}
