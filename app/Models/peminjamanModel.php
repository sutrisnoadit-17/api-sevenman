<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class peminjamanModel extends Model
{
    use HasFactory;
    protected $table = "tb_peminjaman";
    protected $guarded = ['id'];
    public static function insertLoan($argData){
        return DB::table('tb_peminjaman')
                    ->insert($argData);
    }

    public static function accLoan($id){
        return DB::table('tb_peminjaman')
                    ->where('id',$id)
                    ->update(['on_acc'=>1]);
    }

    public static function getLoanLab($argNim){
        return DB::table('tb_peminjaman AS a')
                ->join('tb_labparent AS b','a.lab_id','=','b.id')
                ->where('user_id','=',$argNim)
                ->get();
    }
    public static function getLoanItem($argId){
        return DB::table('tb_peminjaman AS a')
                ->join('tb_item AS b','a.item_id','=','b.id')
                ->where('a.user_id','=',$argId)
                ->get();
    }
    public static function getAll(){
        return DB::table('tb_peminjaman AS a')
        ->join('tb_labparent AS b','a.lab_id','=','b.id')
        ->get();
    }
}
