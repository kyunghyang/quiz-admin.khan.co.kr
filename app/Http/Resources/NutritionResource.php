<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NutritionResource extends JsonResource
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
            "salt" => $this->salt,
            "carbohydrate" => $this->carbohydrate,
            "sugar" => $this->sugar,
            "trans_fat" => $this->trans_fat,
            "saturated_fat" => $this->saturated_fat,
            "cholesterol" => $this->cholesterol,
            "protein" => $this->protein,
            "calorie" => $this->calorie,
        ];
    }
}
