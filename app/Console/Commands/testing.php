<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;

class testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Student::create([
            'name' => 'Sanjay',
            'age' => 25
        ]);
        $this->info('Fake data generated successfully!');

        
    }
}
