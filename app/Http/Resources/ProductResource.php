<?php

namespace App\Http\Resources;

use App\Models\Allergy;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "isDiet" => $this->isDiet,
            "img" => $this->img ? $this->img : "",
            "detail" => $this->detail ? $this->detail : "",
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "allergies" => AllergyResource::collection($this->allergies()->paginate(100)),
            "materials" => MaterialResource::collection($this->materials()->paginate(100)),
            "basic" => BasicResource::make($this->basic),
            "nutrition" => NutritionResource::make($this->nutrition),
            "count_order" => $this->count_order,
            "can_order" => $this->pivot ? $this->pivot->can_order : "",
            "count" => $this->pivot && $this->pivot->count ? $this->pivot->count : 0,
            "assignment_at" => $this->pivot && $this->pivot->assignment_at ? Carbon::make($this->pivot->assignment_at)->format("Y-m-d") : "",
            "created_at" => Carbon::make($this->created_at)->format("Y-m-d H:i"),

            // 회차상품관련
            "diet" => $this->diet ? DietResource::make($this->diet) : "",
            "round" => $this->round,
            "totalCount" => $this->totalCount,
            "delivery_at" => $this->delivery_at ? Carbon::make($this->delivery_at)->format("Y-m-d") : "",
            "roundIncludeProducts" => ProductResource::collection($this->roundIncludeProducts()->paginate(100)),
            "hide" => $this->hide,
            "attached_at" => $this->pivot && $this->pivot->created ? Carbon::make($this->attached_at)->format("Y-m-d H:i") : ""
        ];
    }
}
