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

class ExportOutgoings extends DownloadExcel implements WithMapping, FromCollection, WithHeadings
{
    use InteractsWithQueue, Queueable;

    protected $products;

    public function name()
    {
        return __("ExportOutgoings");
    }

    public function collection()
    {
        $collection = new Collection();

        $orderProducts = OrderProduct::whereHas("outgoing", function($query){
            $query->where("state", OutgoingState::READY);
        })->cursor();


        foreach($orderProducts as $orderProduct){
            $order = $orderProduct->order;

            $product = $orderProduct->product;

            $productTitle = $product->title;

            $optionProducts = $product->optionProducts;

            foreach($optionProducts as $optionProduct){
                $productTitle .= ", ".$optionProduct->title;
            }

            $product->order_id = $order->id;
            $product->delivery_name = $order->delivery_name;
            $product->product_title = $productTitle;
            $product->product_count = $orderProduct->count;
            $product->delivery_contact = $order->delivery_contact;
            $product->delivery_contact2 = $order->delivery_contact2;
            $product->delivery_address_zipcode = $order->delivery_address_zipcode;
            $product->delivery_address = $order->delivery_address;
            $product->delivery_address_detail = $order->delivery_address_detail;
            $product->delivery_memo = $order->delivery_memo;

            $collection->add($product);
        }

        return $collection;
    }


    public function map($model): array
    {
        $this->withFilename("출고내역".Carbon::now()->format("Y-m-d").".xlsx");

        $data = [];

        if($model->delivery_name){
            $data = [
                "CJ택배",
                "",
                $model->order_id,
                $model->delivery_name,
                $model->delivery_contact,
                $model->delivery_contact2,
                $model->product_title,
                $model->product_count,

                $model->delivery_zip_code,
                $model->delivery_address.$model->delivery_address_detail,
                $model->delivery_memo
            ];

        }

        return $data;
    }

    public function headings(): array
    {
        return [
            "택배사",
            "송장번호",
            "출고번호",
            "수취인명",
            "수취인연락처1",
            "수취인연락처2",
            "상품명",
            "수량",

            "우편번호",
            "배송지",
            "배송메세지"
        ];
    }

    /*public function collection()
    {
        $products = [];

        $collection = new Collection();

        $singleOrderProducts = OrderProduct::whereHas("outgoing", function($query){
            $query->where("state", OutgoingState::READY);
        })->whereHas("product", function($query){
            $query->where("diet_id", null);
        })->cursor();

        foreach($singleOrderProducts as $singleOrderProduct){
                isset($products[$singleOrderProduct->product_title])
                ? $products[$singleOrderProduct->product_title] += $singleOrderProduct->count
                : $products[$singleOrderProduct->product_title] = $singleOrderProduct->count;
        }

        $roundOrderProducts = OrderProduct::whereHas("outgoing", function($query){
            $query->where("state", OutgoingState::READY);
        })->whereHas("product", function($query){
            $query->where("diet_id", "!=", null);
        })->cursor();

        foreach($roundOrderProducts as $roundOrderProduct){
            $roundIncludeProducts = $roundOrderProduct->product->roundIncludeProducts;

            foreach($roundIncludeProducts as $roundIncludeProduct){
                isset($products[$roundIncludeProduct->title])
                    ? $products[$roundIncludeProduct->title] += $roundIncludeProduct->pivot->count
                    : $products[$roundIncludeProduct->title] = $roundIncludeProduct->pivot->count;
            }
        }

        foreach($products as $key => $value){
            $collection->add([
                "title" => $key,
                "count" => $value
            ]);
        }

        return $collection;
    }


    public function map($model): array
    {
        $this->withFilename("출고내역".Carbon::now()->format("Y-m-d").".xlsx");

        $data = [
            $model["title"],
            $model["count"],
        ];

        return $data;
    }*/
}
