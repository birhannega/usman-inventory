<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proforma
 *
 * @property $p_id
 * @property $p_to
 * @property $p_date
 * @property $ref_number
 * @property $p_valid_for
 * @property $p_before_vat
 * @property $p_delivery_date
 * @property $p_total
 * @property $p_grand_total
 * @property $p_created_date
 * @property $p_updated_date
 * @property $p_created_user_id
 * @property $p_updated_user_id
 * @property $p_deleted
 * @property $proforma_number
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proforma extends Model
{
    
    static $rules = [
		'p_to' => 'required',
		'ref_number' => 'required',
		'p_valid_for' => 'required',
    'p_delivery_date'=>'required',
    'proforma_number'=>'required||unique:proformas,proforma_number'
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['p_id','p_to','proforma_number','p_date','ref_number','p_valid_for','p_before_vat','p_delivery_date','p_total','p_grand_total','p_created_date','p_updated_date','p_created_user_id','p_updated_user_id','p_deleted','p_is_template'];

protected $dates=['p_date'];

}
