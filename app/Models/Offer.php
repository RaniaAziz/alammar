<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'offers';
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class ,'client_id');
    }

    public function poster(){
        return $this->belongsTo(Poster::class ,'poster_id');
    }

    public function user(){
        return $this->belongsTo(User::class ,'user_id');
    }
}
