<?php

namespace Database\Seeders;

use App\Models\Operational\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = [
            [
                'user_id'         => 2,
                'name'            => 'Dr. Wiki',
                'birth_place'     => 'Belitung',
                'birth_date'      => '2001-12-12',
                'gender'          => 1,
                'contact'         => '082287493718',
                'address'         => 'Jalan Senggoro',
                'age'             => '21',
                'blood_type_id'   => 1,
                'specialist_id'   => 1,
                'photo'           => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s')
            ],
            [
                'user_id'         => 3,
                'name'            => 'Dr. Rizon',
                'birth_place'     => 'Belitung',
                'birth_date'      => '2002-12-12',
                'gender'          => 1,
                'contact'         => '082287641029',
                'address'         => 'Jalan Senggoro',
                'age'             => '20',
                'blood_type_id'   => 2,
                'specialist_id'   => 2,
                'photo'           => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s')
            ],
            [
                'user_id'         => 8,
                'name'            => 'Dr. Aan',
                'birth_place'     => 'Tangun',
                'birth_date'      => '2001-12-12',
                'gender'          => 1,
                'contact'         => '082298652916',
                'address'         => 'Jalan Tangun',
                'age'             => '21',
                'blood_type_id'   => 3,
                'specialist_id'   => 3,
                'photo'           => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s')
            ],
            [
                'user_id'         => 9,
                'name'            => 'Dr. Fikri',
                'birth_place'     => 'Bengkalis',
                'birth_date'      => '2001-12-12',
                'gender'          => 1,
                'contact'         => '082286521024',
                'address'         => 'Jalan Wonosari Timur',
                'age'             => '21',
                'blood_type_id'   => 4,
                'specialist_id'   => 4,
                'photo'           => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s')
            ],
            [
                'user_id'         => 10,
                'name'            => 'Dr. Fitrah',
                'birth_place'     => 'Pematang Duku',
                'birth_date'      => '2001-12-12',
                'gender'          => 2,
                'contact'         => '082298532715',
                'address'         => 'Jalan Pematang Duku',
                'age'             => '21',
                'blood_type_id'   => 5,
                'specialist_id'   => 5,
                'photo'           => null,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s')
            ],
        ];

        Doctor::insert($doctor);
    }
}
