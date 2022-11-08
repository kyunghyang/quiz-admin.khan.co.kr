<?php

namespace App\Http\Resources;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoundProductResource extends JsonResource
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
            "diet_id" => $this->diet_id,
            "diet" => DietResource::make($this->diet),
            "round" => $this->round,
            "totalCount" => $this->totalCount,
            "delivery_at" => $this->delivery_at ? Carbon::make($this->delivery_at)->format("Y-m-d") : "",
            "started_at" => $this->started_at ? Carbon::make($this->started_at)->format("Y-m-d") : "",
            "ended_at" => $this->ended_at ? Carbon::make($this->ended_at)->format("Y-m-d") : "",
            "roundIncludeProducts" => ProductResource::collection($this->roundIncludeProducts()->paginate(100)),

            "title" => $this->title,
            "price" => $this->price,
        ];
    }
}
