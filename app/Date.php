<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dates';

    protected $fillable = ['date', 'description'];

    protected $casts = [
        'description' => 'array',
    ];
}
