<?php


namespace App\Validators;


use App\Bid;

class BidValidator
{
    public function validateOwnership($user, Bid $bid)
    {
        if (!$user->bids->contains($bid)) {
            return abort(403, 'Unauthorized action.');
        }

        return 0;
    }
}
