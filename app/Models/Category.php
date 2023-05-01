<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'status',
    ];
    protected $appends =['photo_url'];
    public function getPhotoUrlAttribute(){
        return asset('/images/Category/'. $this->photo);
    }
    public function item(){
        return $this->belongsToMany(Item::class);
    }
}
