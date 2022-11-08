<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DietIncludeProductController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            "product_id" => "required|integer",
            "diet_product_id" => "required|integer",
            "assignment_at" => "required|date",
            "count" => "required|integer|min:0"
        ]);

        $dietProduct = Product::find($request->diet_product_id);

        $product = Product::find($request->product_id);

        $dietProduct->products()
            ->wherePivot("assignment_at", ">=", Carbon::make($request->assignment_at)->format("Y-m-d"))
            ->wherePivot("assignment_at", "<=", Carbon::make($request->assignment_at)->endOfDay())
            ->wherePivot("product_id", $product->id)
            ->update([
                "count" => $request->count
            ]);

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }
}
