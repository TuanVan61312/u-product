<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class GiftsRepos
{
        public static function getAllProductWithCateName(){
        $sql =' select p.*, c.Cate_Name as CategoryName ';
        $sql .='from gifts as p ';
        $sql .='join category as c on p.Cate_Id = c.Cate_id ';
        $sql .='order by p.Gifts_Name ';

        return DB::select($sql);
    }

    public static function getAllGifts()
    {
        $sql = 'select p.* ';
        $sql .= 'from gifts as p ';
        $sql .= 'order by p.Gifts_id ';

        return DB::select ($sql);
    }

    public static function getGiftsByID($Gifts_id)
    {
        $sql = 'select p.* ';
        $sql .= 'from gifts as p ';
        $sql .= 'where p.Gifts_id = ? ';

        return DB::select($sql, [$Gifts_id]);
    }



    public static function insert($product)
    {
        $sql = 'insert into gifts ';
        $sql .= '(Gifts_Name, Cate_id, Price, Brand, Gifts_Description, Gifts_Images) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?) ';

        $result =  DB::insert($sql, [$product->Gifts_Name, $product->Cate_id,
            $product->Price, $product->Brand, $product->Gifts_Description, $product->Gifts_Images]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function update($product)
    {
        $sql = 'update Gifts ';
        $sql .= 'set Gifts_Name = ?, Cate_id = ?, Price = ?, Brand = ?, Gifts_Description = ?, Gifts_Images = ? ';
        $sql .= 'where Gifts_id = ? ';

        DB::update($sql, [$product->Gifts_Name, $product->Cate_id, $product->Price, $product->Brand,
            $product->Gifts_Description, $product->Gifts_Images, $product->Gifts_id]);
    }


    public static function delete($Elec_id){
        $sql = 'delete from gifts ';
        $sql .= 'where Gifts_id = ? ';

        return DB::delete($sql, [$Elec_id]);
    }


    public static function selectCate($Cate_id){
        $sql = 'select p.* ';
        $sql .= 'from gifts as p ';
        $sql .= 'where p.Gifts_id = ? ';
        return DB::select($sql, [$Cate_id]);
    }
}
