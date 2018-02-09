<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'sku';
    protected $fillable = [
        'sku',
        'goodsno',
        'goodsname',
        'colorid',
        'colordesc',
        'sizedesc'
    ];
}
