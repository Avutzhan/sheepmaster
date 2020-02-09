<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sheeps(){
        return $this->hasMany(Sheep::class);
    }
}
