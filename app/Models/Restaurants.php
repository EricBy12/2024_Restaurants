<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = ['name', 'description', 'location', 'image'];
}
