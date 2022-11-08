<?php

namespace App\Nova\Actions;

use App\Enums\OutgoingState;
use App\Imports\DeliveriesImport;
use App\Models\OrderProduct;
use App\Models\Outgoing;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ImportDeliveries extends \Laravel\Nova\Actions\Action
{
    use InteractsWithQueue, Queueable;

    protected $products;

    public function name()
    {
        return __("ImportDeliveries");
    }

    public function handle(ActionFields $fields)
    {
        Excel::import(new DeliveriesImport(), $fields->file);
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            File::make(__("file"), "file")
                ->rules('required'),
        ];
    }

}
