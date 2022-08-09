<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alan Pacheco',
            'email' => 'alan_y_perla@hotmail.com',
            'ocupation' => 'Propietary',
            'gender' => 'Male',
            'experience' => '1 year of software development',
            'education' => 'Universidad Tecnologica de Tijuana',
            'courses' => 'None',
            'knownments' => 'Software development',
            'languajes' => 'Spanish, English',
            'skills' => 'Software development',
            'interests' => 'Software development, Android development',
            'ubication' => 'Tijuana, Mexico',
            'biography' => 'I am a software developer with a passion for learning and creating new things. I am currently working as a software developer at a startup company in Tijuana, Mexico.',
            'current_job' => 'I am currently working as a software developer at Samsung.',
            'linkedin_url' => 'https://www.linkedin.com/in/alan-pacheco-533385232/',
            'phone_number' => '+52 (663) 3751-694',
            'birthday' => '1998-06-06',
            'password' => bcrypt('12345678'),
        ]);

        User::factory(9)->create();
    }
}
