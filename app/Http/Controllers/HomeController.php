<?php

namespace App\Http\Controllers;

use App\WorkCategory;
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
        //TODO: paginate ads
        //TODO: toast notifications
        return view('home')
            ->with([
                'ads' => $this->ad->getFiltered($request->all())->sortByDesc('created_at'),
                'adCategories' => WorkCategory::all()->sortBy('name'),
            ]);
    }
}
