<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'owner_id',
        'price',
        'description',
        'condition',
        'type',
        'status',
        'photo',
    ];
    protected $appends =['photo_url'];
    public function getPhotoUrlAttribute(){
        return asset('/images/Items/'. $this->photo);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function owner(){
        return $this->belongsTo(Owner::class);
    }
}
