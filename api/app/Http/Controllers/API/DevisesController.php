<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DevisesRequest;
use App\Models\Devises;
use Illuminate\Http\Request;

class DevisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devises = Devises::all();

        return response()->json($devises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevisesRequest $request)
    {

    $devise = Devises::create($request->validated());

    // On retourne les informations du nouveau devise en JSON
    return response()->json($devise, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Devises $devises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devises $devises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devises $devises)
    {
        //
    }
}
