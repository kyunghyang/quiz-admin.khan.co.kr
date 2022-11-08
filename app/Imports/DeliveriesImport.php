<?php

namespace App\Imports;

use App\Enums\KakaoTemplate;
use App\Enums\OutgoingState;
use App\Models\Kakao;
use App\Models\Order;
use App\Models\Outgoing;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DeliveriesImport implements ToModel, WithStartRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $order  = Order::find($row[2]);

        $outgoings = $order->outgoings;

        // 뽀뽀뜨거는 이거랑 달라, 한 주문에 대해 출고가 여러개임. 지금 이 프로젝트만 한 주문당 한 출고
        foreach($outgoings as $outgoing){
            $outgoing->update([
                "delivery_number" => $row[1]
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
