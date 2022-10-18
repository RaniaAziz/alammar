<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemNote extends Model
{
    use HasFactory , SoftDeletes;


    protected $table = 'system_notes';
    protected $guarded = [];


    public function order(){
        return $this->belongsTo(Order::class ,'order_id');
    }


    public function user(){
        return $this->belongsTo(User::class ,'user_id');
    }


}
