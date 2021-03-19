<?php

namespace FridgeCodeWebApp;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'barcode', 'unit_id', 'expiration', 'number_of_item',
    ];
}
