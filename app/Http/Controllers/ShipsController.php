<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipsController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Ship::all()->sortBy('ordering');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getShipById(Request $request): mixed
    {
        return Ship::where('id', $request->route()->id)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCabinsByShip(Request $request): mixed
    {
        return Ship::find($request->route()->id)->cabins()->orderBy('ordering', 'asc')->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getGallery(Request $request): mixed
    {
        return Ship::find($request->route()->id)->gallery()->orderBy('ordering', 'asc')->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateSpecifications(Request $request): mixed
    {
        return Ship::where('id', $request->route()->id)->update(['spec' => json_encode($request->all())]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateDescription(Request $request): mixed
    {
        //dd($request->all()[0]);
        return Ship::where('id', $request->route()->id)->update(['description' => $request->all()[0]]);
    }

}
