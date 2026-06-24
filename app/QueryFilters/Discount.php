<?php
namespace App\QueryFilters;

class Discount
{
    public function handle($query, $next)
    {
        if (request()->filled('discount') && request('discount') == 1) {
            $query->where(function ($subquery) {
                $subquery->whereNotNull('old_price')
                         ->where('old_price', '>', 0);
            });

        }

        return $next($query);
    }

    
            // $filteredFilterValues = array_filter($filterValues, function ($value) {
            //     return !is_null($value) && $value !== '';
            // });

            // if (!empty($filteredFilterValues)) {
            //     $query->with('options')->where(function ($query) use ($filteredFilterValues) {
            //         foreach ($filteredFilterValues as $filterValue) {
            //             $query->whereHas('options', function ($query) use ($filterValue) {
            //                 $query->where('options.id', $filterValue);
            //             });
            //         }
            //     })->withOut('categories');
            // }
}