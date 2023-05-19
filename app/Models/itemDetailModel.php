<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class itemDetailModel extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $table = "tb_item";
    use HasFactory;
    public static function getItem(){
        return DB::table('tb_item AS a')
                    ->join('tb_category as b','a.category_id','=','b.id')
                    ->select('a.id','a.item_name','a.description','a.condition','a.location','a.is_already','a.category_id','a.user_id','b.category_name')
                    ->get();
    }
    public static function getItemDetails($id){
        return DB::table('tb_item AS a')
                    ->join('tb_category as b','a.category_id','=','b.id')
                    ->select('a.id','a.item_name','a.description','a.condition','a.location','a.is_already','a.category_id','a.user_id','b.category_name')
                    ->where('a.id' ,"=", $id)
                    ->get();
    }
    public static function storeItem($argData){
        $argData['created_at'] = \Carbon\Carbon::now();
        return DB::table('tb_item')
                    ->insert($argData);
    }
    public static function updateItem($argdata,$id){
            return DB::table('tb_item')
                    ->where('id' ,$id)
                    ->update($argdata);
    }
}
