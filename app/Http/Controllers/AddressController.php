<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function __construct(AddressService $address) {
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = $this->address->findAll();
        return response()->json($address, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = $this->address->create($request->all());
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $address = $this->address->findById($id);
        return response()->json($address, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $address = $this->address->update($id, $request->all());
        return response()->json($address, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $address = $this->address->delete($id);
        return response()->json($address, 200);
    }
}
