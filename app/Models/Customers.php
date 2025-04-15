<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'city',
        'state',
        'country',
        'zip'
    ];

    protected $guarded = ['store_id'];

    public static function createForStore(array $data, int $storeID) : Customers
    {
        $customer = new static($data);
        $customer->store_id = $storeID;
        $customer->save();
        return $customer;
    }
}
