<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moeda extends Model
{
    protected $fillable = [
        'moeda', 'tipo', 'valor'
    ];
}
