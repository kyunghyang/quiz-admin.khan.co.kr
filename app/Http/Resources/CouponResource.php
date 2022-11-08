<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            "title" => $this->title,
            "price_min" => $this->price_min,
            "price_discount" => $this->price_discount,
            "expiration_period" => $this->expiration_period,
            "used" => $this->pivot ? $this->pivot->used : "",
            "expired_at" => $this->pivot ? $this->pivot->expired_at : ""
        ];
    }
}
