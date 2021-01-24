<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Credit
 *
 * @property $credit_id
 * @property $creditFor
 * @property $createdDate
 * @property $item_code
 * @property $amount
 * @property $unitPrice
 * @property $totalprice
 * @property $returned
 * @property $deleted
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Credit extends Model
{
    
    static $rules = [
		'creditFor' => 'required',
		'item_code' => 'required',
		'amount' => 'required',
	  'unitPrice' => 'required',
	
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['credit_id','creditFor','createdDate','item_code','amount','unitPrice','totalprice','returned','deleted'];
    protected $dates = ['created_at'];




}
