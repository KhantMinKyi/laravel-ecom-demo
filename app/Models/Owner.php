<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'latitude',
        'longitude',
    ];
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
