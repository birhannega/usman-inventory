<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyInformation
 *
 * @property $Id
 * @property $description_am
 * @property $description_en
 * @property $created_date
 * @property $uodated_date
 * @property $created_by
 * @property $updated_by
 * @property $deleted
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompanyInformation extends Model
{
    
    static $rules = [
		'Id' => 'required',
		'description_am' => 'required',
		'description_en' => 'required',
		'created_date' => 'required',
		'uodated_date' => 'required',
		'created_by' => 'required',
		'updated_by' => 'required',
		'deleted' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id','description_am','description_en','created_date','uodated_date','created_by','updated_by','deleted'];



}
