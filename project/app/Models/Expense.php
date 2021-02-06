<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expense
 *
 * @property $exp_id
 * @property $created_at
 * @property $exp_amount
 * @property $updated_at
 * @property $exp_reason
 * @property $deleted
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expense extends Model
{
    
    static $rules = [
		'exp_amount' => 'required',
		'exp_reason' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['exp_id','exp_amount','exp_reason','deleted'];
    protected $dates=['created_at'];



}
