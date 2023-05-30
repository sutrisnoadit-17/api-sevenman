<?php

namespace App\Http\Controllers;

use App\Models\peminjamanModel;
use App\Http\Requests\StorepeminjamanModelRequest;
use App\Http\Requests\UpdatepeminjamanModelRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class PeminjamanModelController extends Controller
{
    
    public function index()
    {
        return response()->json(["message"=>"success","data"=>peminjamanModel::getAll()]);
    }

    public function store(StorepeminjamanModelRequest $request)
    {
        $validator = Validator::make($request->all(),$request->rules());
        if (!$validator->fails()) {
            $request['created_at'] =  \Carbon\Carbon::now();
             peminjamanModel::insertLoan($request->all());
             return response()->json(['message'=>'success']);
        }
    }

    public function update($id)
    {
         peminjamanModel::accLoan($id);
         return response()->json(["message"=>"success"]);
    }

    public function destroy($id)
    {
        $post = peminjamanModel::findOrFail($id);
        $post->delete();
        return response()->json(["message" => "success"]);
    }
    
    public function getLoanLab(Request $request){
        return response()->json(["message"=>"success" , "data"=>peminjamanModel::getLoanLab($request['id']) ]) ;
    }

    public function getLoanitem(Request $request){
        return response()->json(["message"=>"success" , "data"=>peminjamanModel::getLoanItem($request['id'])]) ;
    }
}
