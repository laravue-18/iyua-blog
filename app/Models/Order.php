<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'address1', 'address2', 'country', 'state', 'city', 'postcode', 'phone', 'product_id', 'product_name', 'qty', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
