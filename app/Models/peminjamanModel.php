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


}
