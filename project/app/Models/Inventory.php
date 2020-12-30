<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventory
 *
 * @property $InventoryId
 * @property $ItemCode
 * @property $Quantity
 * @property $UnitPrice
 * @property $TotalPrice
 * @property $UpdatedUserId
 * @property $CreatedUserId
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inventory extends Model
{
    
    static $rules = [
	//	'InventoryId' => 'required',
		'ItemCode' => 'required',
		'Quantity' => 'required',
		'UnitPrice' => 'required',
	//	'TotalPrice' => 'required',
	//	'UpdatedUserId' => 'required',
	//	'CreatedUserId' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ItemCode','Quantity','UnitPrice'];



}
