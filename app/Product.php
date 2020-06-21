<?php

namespace FridgeCodeWebApp;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barcode', 'expiration', 'name', 'location_id', 'brand_id',
    ];
}
