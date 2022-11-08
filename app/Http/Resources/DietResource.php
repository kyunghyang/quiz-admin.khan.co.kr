<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DietResource extends JsonResource
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
            "delivery_amount" => $this->delivery_amount,
            "delivery_dates" => $this->delivery_dates,
            "delivery_duration" => $this->delivery_duration,
            "delivery_started_at" => $this->delivery_started_at,
            "price" => $this->price
        ];
    }
}
