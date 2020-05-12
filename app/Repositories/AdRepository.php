<?php


namespace App\Repositories;


use App\Ad;

class AdRepository extends Repository
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
                    $query->where('work_category_id', '=', $attributes['category']);
                }
            })
            ->where('price_floor', '>=', isset($attributes['min_pay']) ? $attributes['min_pay'] : 0)
            ->where( function ($query) use ($attributes) {
                if (isset($attributes['keyword'])) {
                    $query->where('title', 'LIKE', '%'.$attributes['keyword'].'%')
                        ->orWhere('body', 'LIKE', '%'.$attributes['keyword'].'%');
                }
            });
    }
}
