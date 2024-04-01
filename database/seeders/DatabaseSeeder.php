<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin1'),
        ]);

        $role = Role::create(['name'=>'Admin']);
        $user1->assignRole($role);
    }
}
