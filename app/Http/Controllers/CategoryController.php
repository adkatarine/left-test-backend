<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function __construct(CategoryService $category) {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Cache::remember('category', 43200, function () {
            return $this->category->findAll();
        });

        return response()->json($category, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->category->create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $category = $this->category->findById($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, int $id)
    {
        $category = $this->category->update($id, $request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->category->delete($id);
        return response()->json('Success!', 200);
    }
}
