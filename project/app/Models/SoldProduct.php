<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SoldProduct
 *
 * @property $id
 * @property $sale_id
 * @property $product_id
 * @property $qty
 * @property $price
 * @property $total_amount
 * @property $created_at
 * @property $updated_at
 *
 * @property Producte $producte
 * @property Sale $sale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SoldProduct extends Model
{
    
    static $rules = [
		'sale_id' => 'required',
		'product_id' => 'required',
		'qty' => 'required',
		'price' => 'required',
		'total_amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sale_id','product_id','qty','price','total_amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producte()
    {
        return $this->hasOne('App\Models\Producte', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale', 'id', 'sale_id');
    }
    

}
