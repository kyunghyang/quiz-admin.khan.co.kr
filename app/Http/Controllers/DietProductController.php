<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DietProductController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "diet_product_id" => "nullable|integer",
            "category_id" => "nullable|integer",
            "word" => "nullable|string|max:500",
            "count" => "nullable|integer|min:0|max:500",
            "max_count" => "nullable|integer|min:0|max:500",
        ]);

        $assignedProducts = "";

        $singleProducts = "";

        $dietProduct = "";

        $dietProducts = Product::where("isDiet", true)->paginate(30);

        $categories = Category::paginate(30);

        if($request->diet_product_id){
            $dietProduct = Product::find($request->diet_product_id);

            $assignedProducts = $dietProduct->products()
                ->wherePivot("assignment_at", ">=", Carbon::now()->startOfMonth()->startOfDay()->format("Y-m-d"))
                ->wherePivot("assignment_at", "<=", Carbon::now()->addMonths(3)->endOfMonth()->endOfDay())
                ->orderBy("product_product.assignment_at", "asc")
                ->orderBy("product_product.created_at", "asc")
                ->paginate(100000);
        }

        if($request->category_id){
            $category = Category::find($request->category_id);

            $singleProducts = $category->products();

            if($request->word){
                $singleProducts = $singleProducts->where("title", "LIKE", "%".$request->word."%");
            }

            $singleProducts = $singleProducts->paginate(10000);
        }

        return Inertia::render("DietProducts/Create", [
            "assignedProducts" =>  $assignedProducts ? ProductResource::collection($assignedProducts) : "",
            "singleProducts" =>  $singleProducts ? ProductResource::collection($singleProducts) : "",
            "dietProducts" =>  $dietProducts ? ProductResource::collection($dietProducts) : "",
            "dietProduct" => $dietProduct ? ProductResource::make($dietProduct) : "",
            "categories" =>  CategoryResource::collection($categories),

            "diet_product_id" => $request->diet_product_id ? $request->diet_product_id : "",
            "category_id" => $request->category_id ? $request->category_id : "",
            "word" => $request->word ? $request->word : "",
            "max_count" => $request->max_count ? $request->max_count : 1,
        ]);
    }

    public function attach(Request $request)
    {
        $request->validate([
            "diet_product_id" => "required|integer",
            "product_id" => "required|integer",
            "max_count" => "required|integer",
            "assignment_at" => "nullable|date"
        ]);

        $dietProduct = Product::find($request->diet_product_id);

        $product = Product::find($request->product_id);

        $assignmentAt = $request->assignment_at ? $request->assignment_at : $this->getAssignmentAt($dietProduct, $request->max_count);

        $exist = $dietProduct->products()
            ->wherePivot("assignment_at" , ">=", Carbon::make($assignmentAt)->format("Y-m-d"))
            ->wherePivot("assignment_at" , "<=", Carbon::make($assignmentAt)->endOfDay())
            ->wherePivot("product_id", $product->id)
            ->first();

        if($exist)
            return redirect()->back()->with("error", Carbon::make($assignmentAt)->format("Y-m-d")."에 같은 단품이 이미 존재합니다.");

        $dietProduct->products()->attach($product, [
            "assignment_at" => $assignmentAt,
            "count" => 1
        ]);

        return redirect()->back()->with("success", Carbon::make($assignmentAt)->format("Y-m-d")."에 성공적으로 추가되었습니다.");
    }

    public function getAssignmentAt(Product $dietProduct, $maxCount)
    {
        $lastNeedSupplyDay = $dietProduct->products()
            ->orderBy("product_product.assignment_at", "asc")
            ->groupBy("product_product.assignment_at")
            ->select("product_product.assignment_at", DB::raw('count(*) as total'))
            ->having("total", "<", $maxCount)
            ->first();

        if($lastNeedSupplyDay)
            return Carbon::make($lastNeedSupplyDay->pivot->assignment_at);

        $lastProduct = $dietProduct->products()
            ->orderBy("product_product.assignment_at", "desc")
            ->first();

        return $lastProduct
            ? Carbon::make($lastProduct->pivot->assignment_at)->addDay()
            : Carbon::now()->startOfMonth()->format("Y-m-d");
    }

    public function detach(Request $request)
    {
        $request->validate([
            "product_id" => "required|integer",
            "diet_product_id" => "required|integer",
            "assignment_at" => "required|date",
        ]);

        $dietProduct = Product::find($request->diet_product_id);

        $product = Product::find($request->product_id);


        $dietProduct->products()
            ->wherePivot("assignment_at", ">=", Carbon::make($request->assignment_at)->format("Y-m-d"))
            ->wherePivot("product_id", $product->id)
            ->detach();

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }
}
