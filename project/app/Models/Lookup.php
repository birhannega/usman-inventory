<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lookup
 *
 * @property $lookupId
 * @property $description_am
 * @property $description_en
 * @property $created_at
 * @property $updated_at
 * @property $lookuptypeId
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lookup extends Model
{
    
    static $rules = [
		'lookupId' => 'required',
		'description_am' => 'required',
		'description_en' => 'required',
		'lookuptypeId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lookupId','description_am','description_en','lookuptypeId'];



}
