<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * Mối quan hệ với các sản phẩm.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Mối quan hệ cha.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Mối quan hệ con.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
