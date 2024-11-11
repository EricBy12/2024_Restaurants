<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;
    // Defines the attributes that can be mass filled
    protected $fillable = ['name', 'description', 'location', 'image'];
}
