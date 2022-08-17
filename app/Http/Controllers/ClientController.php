<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Services\AddressService;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{

    public function __construct(ClientService $client, AddressService $address) {
        $this->client = $client;
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new ClientCollection($this->client->findAll());
        return response()->json($client, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        if($request->has('addresses')) {
            $addresses = $request->get('addresses');
            $request->request->remove('addresses');
        }

        $client = $this->client->create($request->all());

        foreach ($addresses as $key => $address) {
            $address['client_id'] = $client->id;
            $addresses[$key] = $this->address->create($address);
        }

        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $client = new ClientResource($this->client->findById($id));
        return response()->json($client, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, int $id)
    {
        $client = $this->client->update($id, $request->all());
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->client->delete($id);
        return response()->json('Success!', 200);
    }
}
