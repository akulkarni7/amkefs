<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    //
    protected $fillable=[
        'id',
        'fund name',
        'fund asset',
        'amount',
        'purchase_price',
        'purchased',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

