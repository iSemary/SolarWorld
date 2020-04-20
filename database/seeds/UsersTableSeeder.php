<?php

use App\Role_user;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10)as $index){
            $User = User::create([
                'full_name' => $faker->name,
                'user_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$12$zOkfR0jjRvsQZtQT4abH0u77OambTuOSSLrkrmCJvmAtv2/GOrDD6',
                'remember_token' => Str::random(10),
            ]);
             Role_user::create([
                'user_id'=>$User->id,
                'role_id'=>'3'
            ]);
        }
    }
}
