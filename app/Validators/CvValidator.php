<?php


namespace App\Validators;


use App\Cv;

class CvValidator
{
    public function validateOwnership($user, Cv $cv)
    {
        if (!$user->cvs->contains($cv)) {
            return abort(403, 'Unauthorized action.');
        }

        return 0;
    }
}
