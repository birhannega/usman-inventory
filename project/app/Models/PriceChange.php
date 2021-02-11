<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceChange
 *
 * @property $id
 * @property $oldPrice
 * @property $newPrice
 * @property $Item_code
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PriceChange extends Model
{
    
    static $rules = [
		'oldPrice' => 'required',
		'newPrice' => 'required',
		'Item_code' => 'required',
		'created_by' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['oldPrice','newPrice','Item_code','created_by'];



}
