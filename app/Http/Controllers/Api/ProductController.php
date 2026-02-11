<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->paginate(15);
        return ProductResource::collection($products);
    }

    public function show(Product $product): ProductResource
    {
        $product->load('category');
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {   
        $product = Product::create($request->validated());
        return response()->json($product, 201); // 201 Created
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204); // 204 No Content
    }
}
