<?php

namespace App\Http\Controllers;

use App\Cv;
use App\JobExperience;
use App\Validators\CvValidator;
use App\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    protected $cvValidator;

    public function __construct(CvValidator $cvValidator)
    {
        $this->cvValidator = $cvValidator;
    }

    protected function experienceValidator(array $data)
    {
        return Validator::make($data, [
            'cv_id' => ['exists:cvs,id'],
            'work_category_id' => ['exists:work_categories,id'],
            'employer' => ['string', 'max:255'],
            'occupation' => ['string', 'max:255'],
            'duration' => ['string', 'max:255'],
            'website' => ['string', 'max:255', 'nullable'],
            'description' => ['string', 'max:10000'],
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->id)->firstOrFail();

        $this->cvValidator->validateOwnership($user, $cv);

        return view('cv.experience.create')
            ->with([
                'cv' => $cv,
                'workCategories' => WorkCategory::all(),
            ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->cv_id)->firstOrFail();
        $requestData = $request->except('_token');

        $this->cvValidator->validateOwnership($user, $cv);
        $validator = $this->experienceValidator($requestData);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $education = new JobExperience($requestData);
        $education->save();

        return redirect()->route('cv.edit', $request->cv_id);
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $cv = Cv::where('id', $request->cv_id)->firstOrFail();
        $jobExperience = JobExperience::where('id', $request->job_experience_id)->first();
        $this->cvValidator->validateOwnership($user, $cv);

        $jobExperience->delete();

        return redirect()->back();
    }
}
