<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    //Configuración para carga masiva

    protected $fillable = ['name', 'description', 'website', 'user_id','phone', 'average_cost', 'average_rating'];
}
