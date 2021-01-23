<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorys extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->delete();
        DB::table('categorys')->insert([
            ['id'=>1,'name'=>'Nam','parent'=>0],
            ['id'=>2,'name'=>'Áo Nam','parent'=>1],
            ['id'=>3,'name'=>'Quần Nam','parent'=>1],
            ['id'=>4,'name'=>'Áo Nam 2018','parent'=>2],
            ['id'=>5,'name'=>'Nữ','parent'=>0],
            ['id'=>6,'name'=>'Áo Nữ','parent'=>5],
            ['id'=>7,'name'=>'Quần Nữ','parent'=>5]
        ]);
    }
}
