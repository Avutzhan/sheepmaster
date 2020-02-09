<?php

namespace App\Http\Controllers;

use App\Models\Corral;
use App\Models\Sheep;
use App\Services\SheepService;

class SheepController extends Controller
{
    protected $sheep_service;

    /**
     * SheepController constructor.
     * @param SheepService $sheep_service
     */
    public function __construct(SheepService $sheep_service)
    {
        $this->sheep_service = $sheep_service;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $sheeps = Sheep::with("corral")->get();

        return $sheeps;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function indexForCorrals()
    {
        $corrals = Corral::with("sheeps")->get();

        return $corrals;
    }

    /**
     * @return array
     */
    public function createSheeps()
    {
        $created = $this->sheep_service->generateRandomSheeps();

        return $created;
    }

    /**
     * @return array
     */
    public function createCorrals()
    {
        $created = $this->sheep_service->createCorrals();

        return $created;
    }
}
