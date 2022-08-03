<?php

namespace Modules\Entity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Entity\Proxies\Repositories\CountryRepository;
use Modules\Entity\Proxies\Repositories\StateRepository;
use Modules\Entity\Transformers\CountryResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getCountries()
    {
        return CountryResource::collection( CountryRepository::filter() );
    }

    /**
     * get states with country
     * @param $id
     * @return CountryResource
     */
    public function getStatesByCountry($id)
    {
        return new CountryResource( CountryRepository::with('states')->findOrFail($id) );
    }

    /**
     * get cities by state
     * @param $id
     * @return CountryResource
     */
    public function getCitiesByState($id)
    {
        return  new CountryResource( StateRepository::with('cities')->find($id) );
    }
}
