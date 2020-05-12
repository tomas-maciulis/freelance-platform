<?php

namespace App\Http\Controllers;

use App\Gender;
use App\User;
use App\WorkCategory;
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
            'first_name' => ['string', 'max:255', 'nullable'],
            'last_name' => ['string', 'max:255', 'nullable'],
            'phone_number' => ['string', 'max:50', 'nullable'],
            'gender_id' => ['exists:genders,id', 'nullable'],
            'birth_date' => ['date', 'nullable'],
        ]);
    }

    public function index()
    {
        $user = Auth::user();
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
                'user' => $user,
                'genders' => $genders,
                'years' => $years,
                'months' => $months,
                'days' => $days,
            ]);
    }

    public function update(Request $request)
    {
        $profile = Auth::user();

        //TODO refactor validation to a cleaner solution
        $requestData = $request->all();
        $birthYear = $request->birth_year;
        $birthMonth = $request->birth_month;
        $birthDay = $request->birth_day;

        if ($birthYear && $birthMonth && $birthDay) {
            $birthDate = $birthYear . '-' . $birthMonth . '-' . $birthDay;
            $requestData['birth_date'] = $birthDate;
        } elseif (!$birthYear && !$birthMonth && !$birthDay){
            $requestData['birth_date'] = null;
        }

        $validator = $this->validator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $profile->update($requestData);
        return redirect()->route('home');
    }

    public function view(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail();

        return view('profile.view')
            ->with([
                'user' => $user,
            ]);
    }

    public function discover(Request $request)
    {
        $profiles = User::all()->sortBy('first_name');
        if ($request->name) {
            $matchedProfiles = [];
            foreach ($profiles as $profile) {
                if (strpos(strtolower($profile->full_name), strtolower($request->name)) !== false) {
                    array_push($matchedProfiles, $profile);
                }
            }
        } else {
            $matchedProfiles = $profiles;
        }

        return view('profile.discover')
            ->with([
                'users' => $matchedProfiles,
            ]);
    }
}
