<?php

namespace App\Http\Controllers;

use App\Ad;
use App\AdCategory;
use App\Repositories\AdRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ad;

    public function __construct(AdRepository $ad)
    {
        $this->ad = $ad;
    }

    public function index(Request $request)
    {
        return view('home')
            ->with(
                [
                    'ads' => $this->ad->getFiltered($request->all())->sortByDesc('created_at'),
                    'adCategories' => AdCategory::all()->sortBy('name'),
                ]);
    }
}
