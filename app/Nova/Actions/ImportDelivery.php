<?php

namespace App\Nova\Actions;

use App\Enums\DeliveryCompany;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class ImportDelivery extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function name()
    {
        return __("ImportDelivery");
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $orderProducts = $model->orderProducts;

            foreach($orderProducts as $orderProduct){
                $orderProduct->update([
                    "delivery_number" => $fields->delivery_number,
                    "delivery_company" => $fields->delivery_company,
                ]);
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make(__("delivery_number"), "delivery_number")->required(),
            Select::make(__("delivery_company"), "delivery_company")->options(DeliveryCompany::options())->required(),
        ];
    }
}
