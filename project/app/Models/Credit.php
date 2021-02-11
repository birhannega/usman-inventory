<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Credit
 *
 * @property $credit_id
 * @property $creditFor
 * @property $returned
 * @property $deleted
 * @property $created_at
 * @property $updated_at
 * @property $created_user_id
 * @property $updated_user_id
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Credit extends Model
{
    use SoftDeletes;

    static $rules = [
		'creditFor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['credit_id','creditFor','returned','deleted','created_user_id','updated_user_id'];



}
