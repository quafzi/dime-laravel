<?php

class CustomerTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('username', 'admin')->first()->id;

        Customer::create([
            'name'    => 'CWE Customer',
            'alias'   => 'cwe',
            'user_id' => $userId,
        ]);
        Customer::create([
            'name'    => 'Another Customer',
            'alias'   => 'ac',
            'user_id' => $userId,
        ]);
    }
}
