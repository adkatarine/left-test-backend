<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct(ClientService $client) {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = $this->client->findAll();
        return response()->json($client, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $this->client->create($request->all());
        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $client = $this->client->findById($id);
        return response()->json($client, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $client = $this->client->update($id, $request->all());
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $client = $this->client->delete($id);
        return response()->json($client, 200);
    }
}
