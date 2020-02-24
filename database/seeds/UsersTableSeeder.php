<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into users ( name , email , role_id, password) values (?, ?,?,?)',
         ['Samayun Chowdhury', 'samayun.m.chowdhry@gmail.com', 1 ,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ]);
    }
}
