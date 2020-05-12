<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
}
