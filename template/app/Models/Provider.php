<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provider
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $paymentinfo
 * @property $email
 * @property $phone
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Receipt[] $receipts
 * @property Transaction[] $transactions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provider extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','paymentinfo','email','phone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt', 'provider_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'provider_id', 'id');
    }
    

}
