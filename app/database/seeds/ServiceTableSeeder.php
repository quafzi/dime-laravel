<?php

class ServiceTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('username', 'admin')->first()->id;
        Service::create([
            'name'        => 'Consulting',
            'alias'       => 'cons',
            'rate'        => 100,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Requirements',
            'alias'       => 'req',
            'rate'        => 100,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Development',
            'alias'       => 'dev',
            'rate'        => 70,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Testing',
            'alias'       => 'test',
            'rate'        => 40,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Documentation',
            'alias'       => 'doc',
            'rate'        => 70,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Project Management',
            'alias'       => 'pm',
            'rate'        => 80,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Quality Assurance',
            'alias'       => 'qa',
            'rate'        => 70,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'System Analysis',
            'alias'       => 'sa',
            'rate'        => 100,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Support',
            'alias'       => 'sup',
            'rate'        => 80,
            'user_id'     => $userId,
        ]);
        Service::create([
            'name'        => 'Infrastructure',
            'alias'       => 'inf',
            'rate'        => 70,
            'user_id'     => $userId,
        ]);
    }
}
