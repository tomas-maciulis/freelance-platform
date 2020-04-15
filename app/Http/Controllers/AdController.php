<?php

namespace App\Http\Controllers;

use App\Ad;
use App\AdCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    public function create(Request $request)
    {
        return view('ad.create')
            ->with(
                [
                    'adCategories' => AdCategory::all()->sortBy('name'),
                ]);
    }

    public function store(Request $request)
    {
        //TODO: move validator outside of the function for reusability
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'body' => 'required|max:10000',
            'ad_category_id' => 'exists:ad_categories,id',
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
}
