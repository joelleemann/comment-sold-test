<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'inventory';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPriceDollarsAttribute()
    {
        return number_format(($this->price_cents /100), 2, '.', ' ');
    }

    public function getCostDollarsAttribute()
    {
        return number_format(($this->cost_cents /100), 2, '.', ' ');
    }

    public function scopeLowStock($query)
    {
        return $query->where('quantity', '<=', 10);
    }
}
