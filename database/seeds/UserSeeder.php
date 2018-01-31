<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user_name' => 'gst',
            'password'  => bcrypt('123456'),
            'user_type' => '30'
        ];

        User::create($data);
    }
}
