<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $Cat_id
 * @property $Cat_name
 * @property $UpdatedUserId
 * @property $CreatedUserId
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    
    static $rules = [
		'Cat_id' => 'required',
		'Cat_name' => 'required',
		'CreatedUserId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Cat_id','Cat_name','UpdatedUserId','CreatedUserId'];



}
