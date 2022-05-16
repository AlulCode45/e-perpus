<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed student
        $student = new \App\Models\StudentModel();
        $data = [
            [
                'name' => 'Alul',
                'email' => 'murid@gmail.com',
                'password' => bcrypt('12345'),
                'class' => 'XI',
                'absent'    => '25',
                'photo_user'    => 'alul.jpg',
            ],
            [
                'name' => 'Arul',
                'email' => 'murid2@gmail.com',
                'password' => bcrypt('12345'),
                'class' => 'XI',
                'absent'    => '24',
                'photo_user'    => 'arul.jpg',
            ],
            [
                'name' => 'Cinta',
                'email' => 'murid3@gmail.com',
                'password' => bcrypt('12345'),
                'class' => 'XI',
                'absent'    => '8',
                'photo_user'    => 'cinta.jpg',
            ],
            [
                'name' => 'Macika',
                'email' => 'murid4@gmail.com',
                'password' => bcrypt('12345'),
                'class' => 'XI',
                'absent'    => '20',
                'photo_user'    => 'macika.jpg',
            ]
        ];
        $student->insert($data);
    }
}
