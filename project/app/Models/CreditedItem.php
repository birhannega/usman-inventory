<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditedItem
 *
 * @property $credited_item_id
 * @property $cr_item_code
 * @property $cr_amount
 * @property $credit_id
 * @property $returned
 * @property $deleted
 * @property $unit_price
 * @property $total_price
 * @property $created_at
 * @property $updated_at
 * @property $created_by
 * @property $updated_by
 * @property $accepted_by
 * @property $cancelled
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CreditedItem extends Model
{
    
    static $rules = [
		//'cr_item_code' => 'required',
		//'cr_amount' => 'required',
		// 'credit_id' => 'required',
		//'returned' => 'required',
		// 'deleted' => 'required',
		// 'unit_price' => 'required',
		// 'total_price' => 'required',
		// 'created_by' => 'required',
		// 'updated_by' => 'required',
		// 'accepted_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['credited_item_id','cr_item_code','cr_amount','credit_id','returned','deleted','unit_price','total_price','created_by','updated_by','accepted_by','cancelled'];



}
