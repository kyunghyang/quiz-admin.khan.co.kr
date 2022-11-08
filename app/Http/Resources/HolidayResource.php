<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidayResource extends JsonResource
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
            "mon" => $this->mon,
            "tue" => $this->tue,
            "wed" => $this->wed,
            "thur" => $this->thur,
            "fri" => $this->fri,
            "sat" => $this->sat,
            "sun" => $this->sun,
            "formedDates" => $this->getDates(),
            "dates" => $this->toDates()
        ];
    }

    public function getDates()
    {
        $dates = "";

        if($this->mon)
            $dates .= "월";

        if($this->tue) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "화";
        }

        if($this->wed) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "수";
        }

        if($this->thur) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "목";
        }

        if($this->fri) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "금";
        }

        if($this->sat) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "토";
        }

        if($this->sun) {
            $dates .= $dates == "" ? "" : ", ";
            $dates .= "일";
        }

        return $dates;
    }
}
