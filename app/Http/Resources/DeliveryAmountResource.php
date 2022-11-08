<?php

namespace App\Http\Resources;

use App\Models\DeliveryDate;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryAmountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "count" => $this->count,
            "deliveryDates" => DeliveryDateResource::collection($this->deliveryDates()->paginate(30))
        ];
    }
}
