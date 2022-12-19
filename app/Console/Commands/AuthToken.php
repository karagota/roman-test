<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class AuthToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-token' .
    '{login : login} ' .
    '{password : password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Authorisation Token';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $login = $this->argument('login');
        if (!$login)
            $login = $this->ask('Please enter user login');
        $password = $this->argument('password');
        if (!$password)
            $password = $this->secret('Please enter user password');
        if (Auth::attempt(array('login' => $login,'password' => $password))) {
            Auth::user()->tokens()->delete();
            $token = Auth::user()->createToken(["*"],Carbon::now()->addMinutes(5));
            $this->info($token->plainTextToken);
            return Command::SUCCESS;
        } else return Command::FAILURE;
    }
}
