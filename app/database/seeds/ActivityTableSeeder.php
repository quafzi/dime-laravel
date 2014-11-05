<?php

class ActivityTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('username', 'admin')->first()->id;
        $services = [
            'consulting'     => Service::where('alias', 'cons')->first()->id,
            'development'    => Service::where('alias', 'dev')->first()->id,
            'infrastructure' => Service::where('alias', 'inf')->first()->id,
        ];
        $customers = [
            'cwe' => Customer::where('alias', 'cwe')->first()->id,
            'ac'  => Customer::where('alias', 'ac')->first()->id,
        ];
        Activity::create([
            'id'             => 1,
            'service_id'     => $services['consulting'],
            'customer_id'    => $customers['cwe'],
            'description'    => 'cwe: initial requirements meeting with customer',
            'rate'           => 80.0,
            'rate_reference' => 'service',
            'user_id'        => $userId,
        ]);
        Activity::create([
            'id'             => 2,
            'service_id'     => $services['consulting'],
            'customer_id'    => $customers['cwe'],
            'description'    => 'cwe: requirements documentation',
            'rate'           => 80.0,
            'rate_reference' => 'service',
            'user_id'        => $userId,
        ]);
        Activity::create([
            'id'             => 3,
            'service_id'     => $services['infrastructure'],
            'customer_id'    => $customers['cwe'],
            'description'    => 'cwe: vhost setup, PHP configuration, .vimrc, tags',
            'rate'           => 80.0,
            'rate_reference' => 'service',
            'user_id'        => $userId,
        ]);
        Activity::create([
            'id'             => 4,
            'service_id'     => $services['development'],
            'customer_id'    => $customers['cwe'],
            'description'    => 'cwe: initial project setup (Symfony2, bundles etc.)',
            'rate'           => 80.0,
            'rate_reference' => 'service',
            'user_id'        => $userId,
        ]);
    }
}
