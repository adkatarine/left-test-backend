<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct(ProductService $product) {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new ProductCollection($this->product->findAll());
        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new ProductResource($this->product->create($request->all()));
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = new ProductResource($this->product->findById($id));
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, int $id)
    {
        if($request->has('_method')) {
            $request->request->remove('_method');
        }

        $product = $this->product->update($id, $request->all());
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->product->delete($id);
        return response()->json('Success!', 200);
    }
}
