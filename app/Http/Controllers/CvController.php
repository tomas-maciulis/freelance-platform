<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Validators\CvValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CvController extends Controller
{
    protected $cvValidator;

    public function __construct(CvValidator $cvValidator)
    {
        $this->cvValidator = $cvValidator;
    }

    protected function cvValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'max:255'],
            'introduction' => ['string', 'max:10000', 'nullable'],
            'qualification' => ['string', 'max:10000', 'nullable'],
        ]);
    }

    public function index()
    {
        $user = Auth::user();

        return view('cv.index')
            ->with([
                'user' => $user,
                'cvs' => $user->cvs,
            ]);
    }

    public function view()
    {
        // TODO: CV view
    }

    public function create(Request $request)
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $requestData = $request->except('_token');

        $validator = $this->cvValidator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cv = new Cv($requestData);
        $cv->user_id = $user->id;
        $cv->save();

        return redirect()->route('cv.edit', $cv->id);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->id)->firstOrFail();

//        TODO: fix $cv->educations->degree relationship
        $this->cvValidator->validateOwnership($user, $cv);

        return view('cv.edit')
            ->with([
                'cv' => $cv,
                'user' => $user,
            ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->id)->firstOrFail();
        $requestData = $request->except('_token');

        $this->cvValidator->validateOwnership($user, $cv);
        $validator = $this->cvValidator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cv->update($requestData);
        $cv->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->cv_id)->firstOrFail();
        $this->cvValidator->validateOwnership($user, $cv);

//        TODO: when deleting CV delete all the children data as well.
        $cv->delete();

        return redirect()->back();
    }
}
