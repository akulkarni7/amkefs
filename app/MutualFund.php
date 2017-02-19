<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    //
    protected $fillable=[
        'customer_id',
        'fund_name',
        'fund_assets',
        'amount',
        'purchase_price',
        'purchased',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

