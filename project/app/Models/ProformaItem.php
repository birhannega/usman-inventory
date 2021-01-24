<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProformaItem
 *
 * @property $id
 * @property $Item_code
 * @property $amount
 * @property $unit_price
 * @property $total_price
 * @property $createdby
 * @property $created_at
 * @property $update_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProformaItem extends Model
{
    
    static $rules = [
		'Item_code' => 'required',
		'amount' => 'required',
		'unit_price' => 'required'
    ];

    protected $perPage = 25;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Item_code','amount','unit_price','total_price','createdby','update_at'];



}
