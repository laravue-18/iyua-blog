<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreConfig extends Model
{
    protected $table = 'core_config';

    protected $fillable = [
        'code',
        'value',
    ];

    protected $hidden = ['token'];
}
