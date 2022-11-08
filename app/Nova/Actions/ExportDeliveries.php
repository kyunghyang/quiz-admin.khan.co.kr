<?php

namespace App\Nova\Actions;

use App\Enums\OutgoingState;
use App\Models\OrderProduct;
use App\Models\Outgoing;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportDeliveries extends DownloadExcel implements WithMapping, FromCollection, WithHeadings
{
    use InteractsWithQueue, Queueable;

    protected $products;

    public function name()
    {
        return __("ExportDeliveries");
    }

    public function collection()
    {
        $collection = new Collection();

        return Outgoing::where("state", OutgoingState::ONGOING)->get();
    }


    public function map($model): array
    {
        $this->withFilename("운송장업로드 ".Carbon::now()->format("Y-m-d").".xlsx");

        $data = [
            $model->id,
            Carbon::now()->format("Y-m-d H:i"),
            "택배,등기,소포",
            "",
            "",
            $model->order->user_contact,
        ];

        return $data;
    }

    public function headings(): array
    {
        return [
            "상품주문번호",
            "발송일",
            "배송방법",
            "택배사",
            "송장번호",
            "구매자연락처",
        ];
    }

}
