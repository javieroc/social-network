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
        factory(App\User::class, 40)->create()->each(function($user){
            $profile = factory(App\Profile::class, 1)->make()->first();
            $user->profile()->save($profile);
        });
    }
}
