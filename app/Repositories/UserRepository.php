<?php


namespace App\Repositories;


use App\User;
use App\Ad;

class UserRepository extends Repository
{
    private $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function getWork(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $bids = $user->bids->pluck('id')->toArray();
        $ads = Ad::whereIn('bid_id', $bids)->get();

        return $ads;
    }
}
