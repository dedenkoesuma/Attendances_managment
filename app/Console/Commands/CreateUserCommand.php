<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUserCommand extends Command
{
    protected $signature = 'filament:user {username : The username of the user} {email : The email address of the user} {password : The password of the user}';
    protected $description = 'Create a new user using Filament';

    public function handle()
    {
        $username = $this->argument('username');
        $email = $this->argument('email');
        $password = $this->argument('password');

        User::create([
            'username' => $username, // Menggunakan username
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('User created successfully.');
    }
}
