<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @property $id
 * @property $tin_number
 * @property $name
 * @property $email
 * @property $phone
 * @property $last_purchase
 * @property $total_purchases
 * @property $total_paid
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Sale[] $sales
 * @property Transaction[] $transactions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{
    use SoftDeletes;

    static $rules = [
		'tin_number' => 'required',
		'name' => 'required',
		
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tin_number','name','email','phone','last_purchase','total_purchases','total_paid'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'client_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'client_id', 'id');
    }
    

}
