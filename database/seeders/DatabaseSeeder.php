<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BloodTypeSeeder::class,
            // BloodSupplySeeder::class,
            DonorTypeSeeder::class,
            MaintenanceSectionSeeder::class,
            PositionSeeder::class,
            PouchTypeSeeder::class,
            ProfessionSeeder::class,
            RoomSeeder::class,
            SpecialistSeeder::class,
            TypeUserSeeder::class,
            UserSeeder::class,
            DoctorSeeder::class,
            OfficerSeeder::class,
            DonorSeeder::class,
            PatientSeeder::class,
            DetailUserSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            PermissionRoleSeeder::class,
            RoleUserSeeder::class,
        ]);
    }
}
