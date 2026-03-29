<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(CategoriesProduct::class,'category_id');
    }
}
