<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $ItemName
 * @property $UpdatedUserId
 * @property $CreatedUserId
 * @property $created_at
 * @property $updated_at
 * @property $Item_code
 * @property $unit
 * @property $amount
 * @property $deleted
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Item extends Model
{
    
    static $rules = [
    'Item_code' => 'required|unique:Items,Item_code',
    'ItemName' => 'required',
		'unit' => 'required',
		'amount' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ItemName','UpdatedUserId','CreatedUserId','Item_code','unit','amount','deleted'];



}
