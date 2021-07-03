<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'order_details_id';
    protected $guarded =[];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
