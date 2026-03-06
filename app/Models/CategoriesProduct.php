<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesProduct extends Model
{
    use HasFactory,HasUuids;

    protected $keyType = 'string';
    protected $table = 'categories_products';

    protected $guarded = ['id'];

    public function mainCategory()
    {
        return $this->belongsTo(CategoriesProduct::class, 'main_category');
    }

    public function ChildCategories()
    {
        return $this->hasMany(CategoriesProduct::class, 'main_category');
    }

}
