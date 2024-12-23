<?php

namespace App\Console\Commands;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class InstallationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

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
        $this->info('Migrating database...');
        $this->callSilent('migrate');
        $this->info('Migrate successfully');

        $this->createAdminAccount();
        $this->info('Created admin account');

        $this->info('Sync assets to database...');
        $this->call('assets:sync');

        $this->info('Enabling major assets');
        $majorAssetSymbol = ['btc', 'eth', 'sol', 'bnb', 'xrp', 'usdc', 'ada', 'usdt', 'trx'];
        Asset::query()->whereIn('symbol', $majorAssetSymbol)->update(['active' => true]);

        $this->info('App installed successfully');
    }

    private function createAdminAccount(): User
    {
        $credentials = [
            'name' => 'Administrator',
            'email' => $this->ask('Email'),
            'password' => $this->secret('Password'),
            'is_admin' => true,
        ];

        $validation = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            $this->error($validation->errors()->first());

            return $this->createAdminAccount();
        }

        return User::query()->create($credentials);
    }
}
