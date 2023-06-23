<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Product 1';
        $stock->item_type='Product';
        $stock->item_image='1.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Product 2';
        $stock->item_type='Product';
        $stock->item_image='2.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Product 3';
        $stock->item_type='Product';
        $stock->item_image='3.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Product 4';
        $stock->item_type='Product';
        $stock->item_image='4.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Product 5';
        $stock->item_type='Product';
        $stock->item_image='5.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Service 1';
        $stock->item_type='Service';
        $stock->item_image='6.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();

        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Service 2';
        $stock->item_type='Service';
        $stock->item_image='7.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();
        
        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Service 3';
        $stock->item_type='Service';
        $stock->item_image='8.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();
        
        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Service 4';
        $stock->item_type='Service';
        $stock->item_image='9.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();
        
        $stock=new Stock();
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $stock->seller_id=$user->id;
        $stock->item_name='Service 5';
        $stock->item_type='Service';
        $stock->item_image='10.jpg';
        $stock->item_price=100;
        $stock->stock_qty=100;
        $stock->save();
    }
}
