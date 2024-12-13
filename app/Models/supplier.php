<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'phone'];
    
    // supplier can have many restaurants
    public function restaurants() {
        return $this->belongsToMany(Restaurants::class);
    }
}
