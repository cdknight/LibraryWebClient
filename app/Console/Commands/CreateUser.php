<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App;


class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'library:user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user in the database. ';

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
     * @return mixed
     */
    public function handle()
    {
        // We need first name, last name, user name, password, email, address, and privileges

        $username = $this->ask("Username");
        $firstname = $this->ask("First Name");
        $lastname = $this->ask("Last Name");
        $email = $this->ask("E-Mail");
        $address = $this->ask("Street Address");
        $password = $this->secret("Password");

        $admin = $this->confirm('Administrator ?');
        $insertbooks = $this->confirm('Can add books to the catalog?');

        // Create the user

        $user = new App\User;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->username = $username;
        $user->email = $email;
        $user->address = $address;

        // Set bogus password to prevent error

        $user->password = "";
        
        $user->save();

        // Create permissions entry

        $user->createPermissions();

        // Set permissions

        $user->userPermissions->admin = $admin;
        $user->userPermissions->insertbooks = $insertbooks;
        $user->userPermissions->save();

        
        
        // Set the password last.

        $user->setPassword($password);

        print "Created user successfully!\n";
    }
}
