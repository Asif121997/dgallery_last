<?php
namespace App\QueryFilters;

class Price
{
    public function handle($query, $next)
    {
        $priceMin = request('price-min');
        $priceMax = request('price-max');

        return $query->where(function ($query) use ($priceMin, $priceMax) {
            if ($priceMin !== null && $priceMax !== null) {
                $query->whereBetween('price', [$priceMin, $priceMax]);
            } elseif ($priceMin !== null) {
                $query->where('price', '>=', $priceMin);
            } elseif ($priceMax !== null) {
                $query->where('price', '<=', $priceMax);
            }
        });
    }
}
