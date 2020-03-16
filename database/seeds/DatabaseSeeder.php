<?php

use Guiliredu\BrazilianCityMigrationSeed\Database\Seeds\StateTableSeeder as SeedsStateTableSeeder;
use Guiliredu\BrazilianCityMigrationSeed\Database\Seeds\CityTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        // $this->call(RolesAndPermissionsSeeder::class);
        $this->call(SeedsStateTableSeeder::class);
        $this->call(CityTableSeeder::class);
    }
}
