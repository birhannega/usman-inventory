<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LookupType
 *
 * @property $ltId
 * @property $description_am
 * @property $description_en
 * @property $created_at
 * @property $updated_at
 * @property $deleted
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LookupType extends Model
{
    
    static $rules = [
		'ltId' => 'required',
		'description_am' => 'required',
		'description_en' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ltId','description_am','description_en','deleted'];



}
