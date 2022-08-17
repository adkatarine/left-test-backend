<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use App\Http\Requests\AddressRequest;

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
     * @param  \App\Http\Requests\AddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $address = $this->address->create($request->all());
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
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
     * @param  \App\Http\Requests\AddressRequest  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, int $id)
    {
        $address = $this->address->update($id, $request->all());
        return response()->json($address, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->address->delete($id);
        return response()->json('Success!', 200);
    }
}
