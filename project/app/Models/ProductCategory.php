<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductCategory
 *
 * @property $id
 * @property $Category_name
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 * @property $last_updated_by
 * @property $Category_desc
 * @property $Created_by
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductCategory extends Model
{
    use SoftDeletes;

    static $rules = [
		'Category_name' => 'required',
		'Created_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Category_name','last_updated_by','Category_desc','Created_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'product_category_id', 'id');
    }
    

}
