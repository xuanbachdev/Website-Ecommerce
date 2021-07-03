<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $guarded =[];
    protected $hidden = [
        'customer_password', 'remember_token',
    ];


//
//    public function orders(){
//        return $this->hasMany(Order::class, 'customer_id', 'id');
//
//
}
