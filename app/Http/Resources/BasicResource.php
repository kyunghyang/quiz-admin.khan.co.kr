<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasicResource extends JsonResource
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
            "amount" => $this->amount,
            "step" => $this->step,
            "type" => $this->type,
            "weight" => $this->weight,
            "storage_method" => $this->storage_method,
            "age" => $this->age,
            "shelf_life" => $this->shelf_life,
        ];
    }
}
