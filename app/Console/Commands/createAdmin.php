<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;

class createAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Admin will be created';

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
        $this->info("creating admin user");
        try {
            User::create([
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123'),
    
            ]);
            $this->info("created admin user successfully");

        } catch(Exception $e) {
            $this->info($e->getMessage());
            
        }
        
        // return 0;
    }
}
