<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function availableSkus()
    {
        return $this->hasMany(Inventory::class)->where('quantity', '>=', '0');
    }
}
