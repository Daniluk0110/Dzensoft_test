<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is the password?');
        $confirmationPassword = $this->secret('Repeat password');

        $isValidName = $this->validateName($name);
        $isEmailValid = $this->validateEmail($email);
        $isValidPassword = $this->validatePassword($password);
        $isPasswordConfirmed = $this->validatePasswordConfirmation($password, $confirmationPassword);

        if ($isValidName && $isEmailValid && $isValidPassword && $isPasswordConfirmed) {
            $password = $this->generatePassword($password);
            $this->createUser($name, $email, $password);
            $this->info('User was successfully created!');
        } else {
            $this->error('Wrong data! Check your input!');
        }
    }

    private function createUser($name, $email, $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    private function generatePassword(string $password)
    {
        return bcrypt($password);
    }

    private function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validateName(string $name)
    {
        return strlen(trim($name));
    }

    private function validatePassword(string $password)
    {
        $minPasswordLength = 8;
        return strlen(trim($password)) >= $minPasswordLength;
    }

    private function validatePasswordConfirmation(string $password, string $confirmationPassword)
    {
        return $password === $confirmationPassword;
    }
}
