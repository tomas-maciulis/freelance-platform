<?php


namespace App\Repositories;


use App\Ad;
use App\Repositories\Interfaces\AdInterface;

class AdRepository extends Repository implements AdInterface
{
    private $ad;

    public function __construct(Ad $ad)
    {
        parent::__construct($ad);
        $this->ad = $ad;
    }

    public function getFiltered(array $attributes)
    {
        return $this->ad
            ->where( function ($query) use ($attributes) {
                if (isset($attributes['category'])) {
                    $query->where('ad_category_id', '=', $attributes['category']);
                }
            })
            ->where('price_floor', '>=', isset($attributes['min_pay']) ? $attributes['min_pay'] : 0)
            ->where( function ($query) use ($attributes) {
                if (isset($attributes['keyword'])) {
                    $query->where('title', 'LIKE', '%'.$attributes['keyword'].'%')
                        ->orWhere('body', 'LIKE', '%'.$attributes['keyword'].'%');
                }
            })
            ->get();
    }
}
