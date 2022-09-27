<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            // remove parent from this category's child
            foreach ($model->childs as $child) {
                $child->parent_id = '';
                $child->save();
            }
            // remove relations products
            $model->products()->detach();
        });
    }

    public function childs()
    {
        // Kustomisasi relationship
        return $this->hasMany('App\Models\ProductGroup', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\ProductGroup', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function scopeNoParent($query)
    {
        return $this->where('parent_id', '');
    }
}
