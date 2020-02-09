<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';

    protected $fillable = ['date', 'description'];

    /**
     * @var array
     */
    protected $casts = [
        'description' => 'array',
    ];
}
