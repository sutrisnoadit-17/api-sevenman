<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    public static function getDataUser($argData){
        // dd($argData['username']);
        $loginReturn = Http::post('<REDACTED>',[
            'username' => $argData['username'],
            'password' => $argData['password']
        ]);
        if ($loginReturn['success']) {
            $data2 = Http::withToken($loginReturn['access_token'])->post('<REDACTED>');
            $argData['email'] = $data2['email'];
            $argData['fullName'] = $data2['full_name'];
            User::insertUser($argData);
            return response()->json(["message"=>"User Found"]);
        }else{
            return response()->json(["message"=>"User Not Found"]);
        }
    }

    public static function insertUser($argData){
        // dd(Hash::make('awkaowaw'));
        $argData['username'] = $argData['username']; 
        return DB::select('call checkUser(?,?,?,?)', [
            $argData['username'],
            $argData['password'],
            $argData['email'],
            $argData['fullName']
        ]);
    }
    public static function searchUser($argData){
       return DB::table('users')
                ->where('username',$argData['username'])
                ->get();
    }
}
