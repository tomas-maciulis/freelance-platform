<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Education;
use App\EducationDegree;
use App\Validators\CvValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    protected $cvValidator;

    public function __construct(CvValidator $cvValidator)
    {
        $this->cvValidator = $cvValidator;
    }

    protected function educationValidator(array $data)
    {
        return Validator::make($data, [
            'cv_id' => ['exists:cvs,id'],
            'education_degree_id' => ['exists:education_degrees,id'],
            'education_provider' => ['string', 'max:255'],
            'specialty' => ['string', 'max:255', 'nullable'],
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->id)->firstOrFail();

        $this->cvValidator->validateOwnership($user, $cv);

        return view('cv.education.create')
            ->with([
                'cv' => $cv,
                'educationDegrees' => EducationDegree::all(),
            ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->cv_id)->firstOrFail();
        $requestData = $request->except('_token');

        $this->cvValidator->validateOwnership($user, $cv);
        $validator = $this->educationValidator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $education = new Education($requestData);
        $education->save();

        return redirect()->route('cv.edit', $request->cv_id);
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->cv_id)->firstOrFail();
        $education = Education::where('id', $request->education_id)->first();
        $this->cvValidator->validateOwnership($user, $cv);

        $education->delete();

        return redirect()->back();
    }
}
