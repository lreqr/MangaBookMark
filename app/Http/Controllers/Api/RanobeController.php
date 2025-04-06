<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRanobeRequest;
use App\Http\Requests\UpdateRanobeRequest;
use App\Models\Ranobe;
use Illuminate\Support\Facades\Response;

class RanobeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = Ranobe::all();
        return Response::json($titles, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRanobeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranobe $ranobe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranobe $ranobe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRanobeRequest $request, Ranobe $ranobe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranobe $ranobe)
    {
        //
    }
}
