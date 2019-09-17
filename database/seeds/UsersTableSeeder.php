<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
    	DB::table('users')->insert([
    		[
    		'name' => 'admin',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('123456'),
    		'role' => 'Administrator',
            'faculty_id' => null,
            'department_id' => null,
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'EC Manager',
            'faculty_id' => null,
            'department_id' => null,
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'Rumi Sir',
            'email' => 'rumi@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'EC Coordinator',
            'faculty_id' => '1',
            'department_id' => null,
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'Siplu Sir',
            'email' => 'siplu@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'EC Coordinator',
            'faculty_id' => '2',
            'department_id' => null,
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'Aziz Sir',
            'email' => 'aziz@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'EC Coordinator',
            'faculty_id' => null,
            'department_id' => '1',
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'ratul',
            'email' => 'ratul@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Student',
            'faculty_id' => null,
            'department_id' => '2',
            'department_id' => '1',
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'rofiq',
            'email' => 'rofiq@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Student',
            'faculty_id' => null,
            'department_id' =>'2',
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ],
            [
            'name' => 'moshiur',
            'email' => 'moshiur@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Student',
            'faculty_id' => null,
            'department_id' =>'4',
            'dob'=>'1992-02-12',
            'gender' => 'male',
            ]
            ]);

    }
}
