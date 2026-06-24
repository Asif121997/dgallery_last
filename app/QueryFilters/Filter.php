<?php
namespace App\QueryFilters;

class Filter
{
    public function handle($query, $next)
    {
        if (request()->filled('filter')) {
            $filterValues = request()->input('filter');

            // Filter out null and empty elements from the 'filter' array
            $filteredFilterValues = array_filter($filterValues, function ($value) {
                return !is_null($value) && $value !== '';
            });

            if (!empty($filteredFilterValues)) {
                $query->with('options')->where(function ($query) use ($filteredFilterValues) {
                    foreach ($filteredFilterValues as $filterValue) {
                        $query->whereHas('options', function ($query) use ($filterValue) {
                            $query->where('options.id', $filterValue);
                        });
                    }
                })->withOut('categories');
            }
        }

        return $next($query);
    }
}