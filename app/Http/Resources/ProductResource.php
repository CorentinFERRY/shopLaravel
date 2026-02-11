<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'formatted_price' => number_format($this->price, 2, ',', ' ') . ' €',
            'in_stock' => $this->stock > 0,

            // Relations (seulement si chargées)
            'category' => new CategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->toISOString(),
        ];
    }
}
