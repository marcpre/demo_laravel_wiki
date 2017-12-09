<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoAsset extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_logo', 'name', 'symbol', 'current_price',
    ];
}
