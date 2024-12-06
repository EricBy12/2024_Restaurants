<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Restaurants extends Model
{
    use HasFactory;
    // Defines the attributes that can be mass filled
    protected $fillable = ['name', 'description', 'location', 'image'];

    //Reviews Function
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // restaurants can have many suppliers
    public function suppliers() {
        return $this->belongsToMany(Suppliers::class);
    }
}
