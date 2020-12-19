<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $ItemId
 * @property $ItemName
 * @property $ItemCategory
 * @property $UpdatedUserId
 * @property $CreatedUserId
 * @property $created_at
 * @property $updated_at
 * @property $Item_code
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Item extends Model
{
    
    static $rules = [
		'ItemId' => 'required',
		'ItemName' => 'required',
		'ItemCategory' => 'required',
		'UpdatedUserId' => 'required',
		'CreatedUserId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ItemId','ItemName','ItemCategory','UpdatedUserId','CreatedUserId','Item_code'];



}
