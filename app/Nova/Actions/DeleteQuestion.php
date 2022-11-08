<?php

namespace App\Nova\Actions;

use App\Enums\QnaType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class DeleteQuestion extends Action
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
        return __("DeleteQuestion");
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach($models as $model){
            $model->update([
                "reason_remove" => $fields->reason_remove,
                "user_remove" => auth()->user()->name,
            ]);

            $model->delete();
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
            Text::make(__("reason_remove"), "reason_remove")
        ];
    }
}
