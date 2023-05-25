<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function getData(Request $request){
        return User::getDataUser($request->all());
    }
    public function insertUser(Request $request){
        User::insertUser($request->all());
    }
    public function searchUser(Request $request){
        $data = json_encode(User::searchUser($request->all()));
        return response()->json(["message" => "success" ,"data" => json_decode($data)]);
    }
}
