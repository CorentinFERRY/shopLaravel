<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(ProductFilterRequest $request){
        
        $validated = $request->validated();    
        $query = Product::with('category')
        ->when(isset($validated['category']), fn($q) =>                     //-> when($request->filled('category'), function ($q) use ($request){ $q->where('category_id', $request->category) });
            $q->where('category_id', $validated['category'])
        )
        ->when(isset($validated['search']), fn($q) =>
            $q->where('name', 'like', '%' . $validated['search'] . '%')
        )
        ->when(isset($validated['min_price']), fn($q) =>
            $q->where('price', '>=', $validated['min_price'])
        )
        ->when(isset($validated['max_price']), fn($q) =>
            $q->where('price', '<=', $validated['max_price'])
        );
        $sort = $validated['sort'] ?? 'created_at';
        $order = $validated['order'] ?? 'desc';
        $query->orderBy($sort, $order);
        $products = $query->paginate(15);
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
        $product->load('category');
        return new ProductResource($product);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $product->load('category');
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204); // 204 No Content
    }
}
