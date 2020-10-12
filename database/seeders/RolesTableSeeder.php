<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $role = Role::factory()->create(['name' => 'admin','description' => 'Administrator']);
        $role = Role::factory()->create(['name' => 'user','description' => 'Basic User']);
        $role = Role::factory()->create(['name' => 'designer','description' => 'Designer Graphic']);
        $role = Role::factory()->create(['name' => 'social_media','description' => 'Administrator']);
        $role = Role::factory()->create(['name' => 'editor','description' => 'Editor']);           
    }
}
