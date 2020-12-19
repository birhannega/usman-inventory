<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transfer
 *
 * @property $id
 * @property $title
 * @property $sender_method_id
 * @property $receiver_method_id
 * @property $sended_amount
 * @property $received_amount
 * @property $reference
 * @property $created_at
 * @property $updated_at
 *
 * @property PaymentMethod $paymentMethod
 * @property PaymentMethod $paymentMethod
 * @property Transaction[] $transactions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transfer extends Model
{
    
    static $rules = [
		'sender_method_id' => 'required',
		'receiver_method_id' => 'required',
		'sended_amount' => 'required',
		'received_amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','sender_method_id','receiver_method_id','sended_amount','received_amount','reference'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'sender_method_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'receiver_method_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'transfer_id', 'id');
    }
    

}
