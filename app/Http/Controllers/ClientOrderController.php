<?php

namespace App\Http\Controllers;

use App\Services\ClientOrderService;
use App\Http\Resources\ClientOrderCollection;
use App\Http\Resources\ClientOrderResource;
use Illuminate\Http\Request;

class ClientOrderController extends Controller
{

    public function __construct(ClientOrderService $clientOrder) {
        $this->clientOrder = $clientOrder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientOrder = new ClientOrderCollection($this->clientOrder->findAll());
        return response()->json($clientOrder, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientOrder = new ClientOrderResource($this->clientOrder->create($request->all()));
        return response()->json($clientOrder, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientOrder  $clientOrder
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $clientOrder = new ClientOrderResource($this->clientOrder->findById($id));
        return response()->json($clientOrder, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientOrder  $clientOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $clientOrder = $this->clientOrder->update($id, $request->all());
        return response()->json($clientOrder, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientOrder  $clientOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $clientOrder = $this->clientOrder->delete($id);
        return response()->json($clientOrder, 200);
    }
}
