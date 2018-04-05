<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
        $this->call(productSeeder::class);
        $this->call(categorySeeder::class);
    }
}
class userSeeder extends Seeder 
{
    public function run() 
    {
        DB::table('users')->insert([
            ['name'=>'Vy', 'email'=>str_random(3).'@azwebplus.com', 'password'=>bcrypt('12345')],
            ['name'=>'Dang', 'email'=>str_random(3).'@azwebplus.com', 'password'=>bcrypt('12345')],
            ['name'=>'Kiet', 'email'=>str_random(3).'@azwebplus.com', 'password'=>bcrypt('12345')],
        ]);
    }
}
class productSeeder extends Seeder 
{
    public function run()
    {
        DB::table('product')->insert([
            ['name_product'=>'Asus '.str_random(5), 'id_category'=>'1', 'soluong'=> '0'],
            ['name_product'=>'Lenovo '.str_random(5), 'id_category'=>'3', 'soluong'=> '0'],
            ['name_product'=>'Dell '.str_random(5), 'id_category'=>'2', 'soluong'=> '0'],
            ['name_product'=>'Asus '.str_random(5), 'id_category'=>'1', 'soluong'=> '0'],
        ]);
    }
}

class categorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            ['name_category'=> 'Asus'],
            ['name_category'=> 'Dell'],
            ['name_category'=> 'Lenovo'],
            ['name_category'=> 'HP'],            
            ['name_category'=> 'Apple'],
        ]);
    }
}