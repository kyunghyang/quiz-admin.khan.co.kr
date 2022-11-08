<?php

namespace App\Nova\Lenses;

use App\Enums\OutgoingState;
use App\Nova\임시\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class TodayOutgoings extends Lens
{

    public function name()
    {
        return __("TodayOutgoings");
    }

    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->where("state", OutgoingState::WAIT)
                ->where("delivery_at", "<=", Carbon::today()->endOfDay())
                ->orderBy("created_at", "asc")
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make(__("Order"), "order", Order::class)->exceptOnForms(),
            Select::make(__("state"), "state")->options(OutgoingState::options())->displayUsingLabels(),
            Date::make(__("delivery_at"), "delivery_at")->rules(["required", "date"])->exceptOnForms(),
            Text::make(__("delivery_number"), "delivery_number")->rules(["required", "string", "max:500"])
        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'today-outgoings';
    }
}
