<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairesRequest;
use App\Models\Paires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paires = Paires::all();

        return response()->json($paires);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PairesRequest $request)
    {
        $paire = Paires::create($request->validated());

    // On retourne les informations du nouveau paire en JSON
    return response()->json($paire, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($from_devise, $to_devise)
    {
        $result = DB::table('paires')->where('from_devise_id', $from_devise)
                                     ->where('to_devise_id', $to_devise)
                                     ->value('value');
        return response()->json($result, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paires $paires)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paires $paires)
    {
        //
    }

    public function valuePaire($from_devise, $to_devise, $value)
    {
        $result = DB::table('paires')->where('from_devise', $from_devise)
                                     ->where('to_devise', $to_devise)
                                     ->first();
        $converted = $result->value * $value;
        return response()->json(["from" => $result->from_devise, "to" => $result->to_devise, "converted" => $converted], 201);
    }

    public function updatePaire($from_devise, $to_devise, Request $request)
    {
        $updated = DB::table('paires')->where('from_devise', $from_devise)
                                      ->where('to_devise', $to_devise)
                                      ->update(['value' => $request['value']]);
        return response()->json('updated');
    }

    public function deletePaire($from_devise, $to_devise)
    {
        $deleted = DB::table('paires')->where('from_devise', $from_devise)
                                      ->where('to_devise', $to_devise)
                                      ->delete();
        return response()->json('supprimé');
    }
}
