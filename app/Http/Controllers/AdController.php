<?php

namespace App\Http\Controllers;

use App\Ad;
use App\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    public function view(Request $request)
    {
        $ad = Ad::where('id', $request->id)->firstOrFail();

        return view('ad.view')
            ->with([
                'ad' => $ad,
            ]);
    }

    public function create(Request $request)
    {
        return view('ad.create')
            ->with(
                [
                    'workCategories' => WorkCategory::all()->sortBy('name'),
                ]);
    }

    public function store(Request $request)
    {
        //TODO: move validator outside of the function for reusability
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'body' => 'required|max:10000',
            'work_category_id' => 'exists:work_categories,id',
            'price_floor' => 'required|numeric|between:0.00,99999999.99',
            'price_ceiling' => [
                'required',
                'numeric',
                'between:0.00,99999999.99',
                'greater_or_equals_to:price_floor',
        ]]);

        if ($validator->fails()) {
            return redirect(route('ad.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $adData = $request->except('_token');
        $adData['user_id'] = Auth::user()->id;
        Ad::create($adData);

        return redirect(route('home'));
    }

    public function remember(Request $request)
    {
        $user = Auth::user();

        $user->rememberedAds()->attach($request->id);

        return redirect()->back();
    }

    public function forget(Request $request)
    {
        $user = Auth::user();

        $user->rememberedAds()->detach($request->id);

        return redirect()->back();
    }

    public function remembered(Request $request)
    {
        $user = Auth::user();
        $ads = $user->rememberedAds;

        return view('ad.remembered')
            ->with([
                'ads' => $ads,
                'user' => $user,
            ]);
    }
}
