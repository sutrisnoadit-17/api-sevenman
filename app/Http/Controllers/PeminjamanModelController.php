<?php

namespace App\Http\Controllers;

use App\Models\peminjamanModel;
use App\Http\Requests\StorepeminjamanModelRequest;
use App\Http\Requests\UpdatepeminjamanModelRequest;
use Illuminate\Support\Facades\Validator;

class PeminjamanModelController extends Controller
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
    public function store(StorepeminjamanModelRequest $request)
    {
        $validator = Validator::make($request->all(),$request->rules());
        if (!$validator->fails()) {
            $request['created_at'] =  \Carbon\Carbon::now();
             peminjamanModel::insertLoan($request->all());
             return response()->json(['message'=>'success']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(peminjamanModel $peminjamanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminjamanModel $peminjamanModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
         peminjamanModel::accLoan($id);
         return response()->json(["message"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = peminjamanModel::findOrFail($id);
        $post->delete();
        return response()->json(["message" => "success"]);
    }
}
