<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
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
            "default" => $this->default,
            "title" => $this->title,
            "name" => $this->name,
            "contact" => $this->contact,
            "address" => $this->address,
            "address_detail" => $this->address_detail,
            "memo" => $this->memo
        ];
    }
}
