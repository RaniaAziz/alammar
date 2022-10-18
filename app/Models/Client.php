<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Client extends Model
{
    use HasFactory, SoftDeletes , HasApiTokens;



    protected $table = 'clients';
    protected $guarded = [];

    public function order(){
        return $this->hasMany(Order::class,'client_id');
    }

    public function offer(){
        return $this->hasMany(Offer::class,'client_id');
    }

}
