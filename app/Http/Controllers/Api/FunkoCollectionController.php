<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FunkoCollectionResource;
use App\Models\FunkoCollection;
use Illuminate\Http\Request;

class FunkoCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funko_collections = FunkoCollection::all();
        return FunkoCollectionResource::collection($funko_collections)->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funko_collection = new FunkoCollection();
        $funko_collection->name = $request->input('name');
        $funko_collection->imagen = $request->input('image');

        try {
            $funko_collection->save();
            $respuesta = (new FunkoCollectionResource($funko_collection))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $e) {
            $respuesta = response()
                        ->json(['error' => $e], 400);
        }

        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FunkoCollection  $funkoCollection
     * @return \Illuminate\Http\Response
     */
    public function show(FunkoCollection $funkoCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FunkoCollection  $funkoCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FunkoCollection $funkoCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FunkoCollection  $funkoCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(FunkoCollection $funkoCollection)
    {
        //
    }
}
