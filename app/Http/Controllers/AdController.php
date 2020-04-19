<?php

namespace App\Http\Controllers;

use App\Ad;
use App\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
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

        Ad::create($request->except('_token'));

        return redirect(route('home'));
    }
}
