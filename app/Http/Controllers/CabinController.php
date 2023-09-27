<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use Illuminate\Http\Request;

class CabinController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Cabin::all()->sortBy('ordering');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCabinById(Request $request): mixed
    {
        return Cabin::where('id', $request->route()->id)->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed
    {
        return Cabin::find($request->route('id'))->update($request->all());
    }
}
