<?php

class DatabaseSeeder extends Seeder {

    use DimeCoreSeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->seedDimeCore();
    }
}
