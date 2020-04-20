<?php

namespace App\Http\Controllers;

use App\WorkCategory;
use App\Repositories\AdRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function index(Request $request)
    {
        //TODO: paginate ads
        //TODO: toast notifications
        return view('home')
            ->with([
                'ads' => $this->adRepository->getFiltered($request->all())->orderBy('created_at', 'desc')->paginate(50),
                'adCategories' => WorkCategory::all()->sortBy('name'),
            ]);
    }
}
