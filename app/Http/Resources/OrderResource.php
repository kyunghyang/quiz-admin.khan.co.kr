<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            // "imp_uid" => $this->imp_uid,
            "merchant_uid" => $this->merchant_uid,
            "id" => $this->id,

            "user_id" => $this->user_id,
            "user_name" => $this->user_name,
            "user_contact" => $this->user_contact,
            "user_email" => $this->user_email,

            "pay_method_id" => $this->pay_method_id,
            "pay_method_name" => $this->pay_method_name,
            "pay_method_pg" => $this->pay_method_pg,
            "pay_method_method" => $this->pay_method_method,
            // "pay_method_commission" => $this->pay_method_commission,

            "delivery_title" => $this->delivery_title,
            "delivery_name" => $this->delivery_name,
            "delivery_contact" => $this->delivery_contact,
            "delivery_address" => $this->delivery_address,
            "delivery_memo" => $this->delivery_memo,
            "delivery_price" => $this->delivery_price,

            "coupon_id" => $this->coupon_id,
            "coupon_title" => $this->coupon_title,
            "coupon_price_min" => $this->coupon_price_min,
            "coupon_price_discount" => $this->coupon_price_discount,

            "point_use" => $this->point_use,
            "point_give" => $this->point_give,

            "price_total" => $this->price_total,
            "price_real" => $this->price_real,

            "state" => $this->state,
            "memo" => $this->memo,
            "delivery_at" => Carbon::make($this->delivery_at)->format("Y-m-d H:i"),

            "vbank_num" => $this->vbank_num,
            "vbank_name" => $this->vbank_name,
            "vbank_date" => $this->vbank_date,

            "created_at" => Carbon::make($this->created_at)->format("Y-m-d H:i")
        ];
    }
}
