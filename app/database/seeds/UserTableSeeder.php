<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->delete();

        User::create([
            'username' => 'admin',
            'password' => Hash::make('kitten')
        ]);
	}

}
