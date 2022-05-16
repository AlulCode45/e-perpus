<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Teacher extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new \App\Models\TeacherModel();
        $data = [
            'name' => 'Student',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('12345'),
        ];
        $teacher->create($data);
    }
}
