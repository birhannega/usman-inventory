<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 *
 * @property $id
 * @property $selled_by
 * @property $buyer_name
 * @property $total_amount
 * @property $created_at
 * @property $updated_at
 * @property $item_code
 * @property $unit_price
 * @property $amount
 *@property with_vat
 * @property SoldProduct[] $soldProducts
 * @property Transaction[] $transactions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    
    static $rules = [
		'buyer_name' => 'required',
		//'total_amount' => 'required',
		//'item_code' => 'required',
		//'unit_price' => 'required',
		//'amount' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['selled_by','with_vat','buyer_name','total_amount','item_code','unit_price','amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soldProducts()
    {
        return $this->hasMany('App\Models\SoldProduct', 'sale_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'sale_id', 'id');
    }
    

}
