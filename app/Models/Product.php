<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'model', 'price', 'weight'];

    public function productGroups()
    {
        return $this->belongsToMany('App\Models\ProductGroup');
    }
}
