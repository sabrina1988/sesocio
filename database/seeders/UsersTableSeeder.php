<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(50)->create();  
        $user = User::all();

        foreach ($user as $key => $u) {            
            switch ($key) {                
                case ($key < 3):                   
                    $u->roles()->attach(1);
                    break;
                
                case ($key < 20):                   
                    $u->roles()->attach(2);
                    break;

                case ($key < 25):                   
                    $u->roles()->attach(3);
                    break;

                case ($key < 35):                   
                    $u->roles()->attach(4);
                    break;

                case ($key < 50):                   
                    $u->roles()->attach(5);
                    break;
                
                default:
                    $u->roles()->attach(3);
                    break;
            }                    
        }  

    }
}
