<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    /**
     * Récupère le numéro de commande (numéroté par utilisateur)
     */
    public function getOrderNumberAttribute()
    {
        return $this->user->orders()
                          ->where('id', '<=', $this->id)
                          ->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
