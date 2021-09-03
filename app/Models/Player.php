<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * Atributos para inserção em massa
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'skill_level',
        'confirmed',
        'goalkeeper'
    ];

}
