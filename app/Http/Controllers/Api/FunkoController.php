<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FunkoResource;
use App\Models\Funko;
use Illuminate\Http\Request;

class FunkoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funko = Funko::all();
        return FunkoResource::collection($funko)->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funko  $funko
     * @return \Illuminate\Http\Response
     */
    public function show(Funko $funko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funko  $funko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funko $funko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funko  $funko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funko $funko)
    {
        //
    }
}
