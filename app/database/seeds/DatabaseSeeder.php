<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('timeslices')->delete();
        DB::table('activities')->delete();
        DB::table('projects')->delete();
        DB::table('services')->delete();
        DB::table('customers')->delete();
        DB::table('users')->delete();

        $this->call('UserTableSeeder');
        $this->call('CustomerTableSeeder');
        $this->call('ProjectTableSeeder');
        $this->call('ServiceTableSeeder');
        $this->call('ActivityTableSeeder');
        $this->call('TimesliceTableSeeder');
    }
}
