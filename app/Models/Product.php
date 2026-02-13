<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[UseFactory(ProductFactory::class)]
class Product extends Model
{
    use HasFactory,SoftDeletes;

    // Colonnes autorisées pour l'assignation de masse
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price',
        'stock',
        'active',
        'category_id',
    ];

    // Conversion automatique des types 
    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    //Scopes pour les filtres de produits
    protected function scopeActive($query)
    {
        return $query->where('active', true);
    }

    protected function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }   

    protected function scopeCheap($query)
    {
        return $query->where('price', '<=', 100);
    }

    protected function scopeCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Accesseur : formater le prix pour l'affichage
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price, 2, ',', ' ') . ' €',
        );
    }

    // Mutateur : slug automatique depuis le nom
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => [
                'name' => $value,
                'slug' => Str::slug($value),
            ],
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
