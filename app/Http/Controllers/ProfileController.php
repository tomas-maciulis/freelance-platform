<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //TODO:email validation
        return Validator::make($data, [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'phone_number' => ['string', 'max:50'],
            'gender_id' => ['exists:genders,id'],
            'birth_date' => ['date'],
        ]);
    }

    public function index()
    {
        $profile = Auth::user();
        $genders = Gender::all();

        //TODO: move date configuration to a service provider
        $years = [];
        for ($i=1900; $i<=2020; $i++) {
            array_push($years, $i);
        }

        $months = [];
        for ($i=1; $i<=12; $i++) {
            array_push($months, $i);
        }

        $days = [];
        for ($i=1; $i<=31; $i++) {
            array_push($days, $i);
        }

        return view('profile.index')
            ->with([
                'profile' => $profile,
                'genders' => $genders,
                'years' => $years,
                'months' => $months,
                'days' => $days,
            ]);
    }

    public function update(Request $request)
    {
        //TODO improve code quality
        $profile = Auth::user();

        $requestData = $request->all();
        $birthYear = $request->birth_year;
        $birthMonth = $request->birth_month;
        $birthDay = $request->birth_day;

        if ($birthYear && $birthMonth && $birthDay) {
            $birthDate = $birthYear . '-' . $birthMonth . '-' . $birthDay;
            $requestData['birth_date'] = $birthDate;
        }

        $validator = $this->validator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $profile->update($requestData);
        return redirect()->route('home');
    }
}
