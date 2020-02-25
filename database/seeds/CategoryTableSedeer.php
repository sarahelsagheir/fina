<?php

use Illuminate\Database\Seeder;

class CategoryTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['title'=>'Fiction']);
        \App\Category::create(['title'=>'Histroy']);
        \App\Category::create(['title'=>'Life-coaching']);
        \App\Category::create(['title'=>'letrature']);
        \App\Category::create(['title'=>'Psychology']);
        \App\Category::create(['title'=>'Childern']);
        \App\Category::create(['title'=>'Other']);
       
    }
}

 

  