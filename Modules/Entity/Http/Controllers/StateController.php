<?php

namespace Modules\Entity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Entity\Repositories\StateRepository;
use Modules\Entity\Transformers\StateResource;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return StateResource::collection(StateRepository::filter());
    }
}
