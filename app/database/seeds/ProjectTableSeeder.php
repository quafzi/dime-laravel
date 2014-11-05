<?php

class ProjectTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('username', 'admin')->first()->id;
        $customers = [
            'cwe' => Customer::where('alias', 'cwe')->first()->id,
            'ac'  => Customer::where('alias', 'ac')->first()->id,
        ];
        Project::create([
            'name'        => 'PHPUGL Coding Weekend',
            'alias'       => 'cwe',
            'customer_id' => $customers['cwe'],
            'user_id'     => $userId,
        ]);
        Project::create([
            'name'        => 'PHP Usergroup Meetup July',
            'alias'       => 'phpugl',
            'customer_id' => $customers['ac'],
            'user_id'     => $userId,
        ]);
    }
}
