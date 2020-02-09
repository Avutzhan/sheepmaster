<?php

namespace App\Http\Controllers;

use App\Models\Corral;
use App\Models\Sheep;

class SheepController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(){
        $sheeps = Sheep::with("corral")->get();

        return $sheeps;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function indexForCorrals(){
        $corrals = Corral::with("sheeps")->get();

        return $corrals;
    }
}
