<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Http\Requests\StorecategoryModelRequest;
use App\Http\Requests\UpdatecategoryModelRequest;

class CategoryModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorecategoryModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(categoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoryModel $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryModelRequest $request, categoryModel $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoryModel $categoryModel)
    {
        //
    }
}
