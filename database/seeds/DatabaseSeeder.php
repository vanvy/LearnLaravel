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
            ['name_product'=>'Asus'.str_random(4), 'id_category'=>'1'],
            ['name_product'=>'Lenovo'.str_random(4), 'id_category'=>'2'],
            ['name_product'=>'Dell'.str_random(4), 'id_category'=>'3'],
            ['name_product'=>'Asus'.str_random(4), 'id_category'=>'1'],
        ]);
    }
}