<?php

namespace App\Http\Controllers;
use App\Models\itemDetailModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreitemDetailModelRequest;
use App\Http\Requests\UpdateitemDetailModelRequest;
use lluminate\Queue\Jobs\RedisJob;

class ItemDetailModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["message" => "success" ,"data" => ItemDetailModel::getItem()]);
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
    public function store(StoreitemDetailModelRequest $request)
    {
        $validator = Validator::Make($request->all(),$request->rules());
        if (!$validator->fails()) {
            $request['created_at'] =  \Carbon\Carbon::now();
            itemDetailModel::storeItem($request->all());
            return response()->json(["message" => "success"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(["message" => "success" ,"data" => ItemDetailModel::getItemDetails($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(itemDetailModel $itemDetailModel)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateitemDetailModelRequest $request, $id)
    {
        $validator = Validator::Make($request->all(),$request->rules());
        if (!$validator->fails()) {
            $request['updated_at'] =  \Carbon\Carbon::now();
            itemDetailModel::updateItem($request->all(),$id);
            return response()->json(["message" => "success"]);
        }
    }

 
    public function destroy($id)
    {
        $post = itemDetailModel::findOrFail($id);
        $post->delete();
        return response()->json(["message" => "success"]);
    }
}
