<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(TShopsSeeder::class);
        $this->call(TCoursesSeeder::class);
        $this->call(TAppointmentsSeeder::class);
        $this->call(TStaffsSeeder::class);
        $this->call(TWorkDaysSeeder::class);
        $this->call(TUsersSeeder::class);
        Model::reguard();
    }
}
