<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Repositories\UserRepository;
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

    private function validateAccess($user, Ad $ad)
    {
        if ($ad->worker->id == $user->id) {
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
}
