<?php

namespace App\Nova\Filters;

use App\Enums\BrandEventType;
use App\Enums\FaqType;
use App\Enums\QnaState;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class QnaStateFilter extends Filter
{

    public function name()
    {
        return __("QnaStateFilter");
    }

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where("state", $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return QnaState::options();
    }
}
