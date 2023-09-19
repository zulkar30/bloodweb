<?php

namespace Database\Seeders;

use App\Models\Operational\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = [
            [
                'no_mr'                     => 'MR00001',
                'name'                      => 'Syaifuddin Rambe',
                'birth_place'               => 'Kisaran',
                'birth_date'                => '2010-12-12',
                'gender'                    => 1,
                'contact'                   => '082287463201',
                'address'                   => 'Jalan Kisaran',
                'age'                       => '12',
                'blood_type_id'             => 1,
                'maintenance_section_id'    => 1,
                'room_id'                   => 1,
                'diagnosis'                 => 'Anemia',
                'photo'                     => null,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ],
            [
                'no_mr'                     => 'MR00002',
                'name'                      => 'Suryadi',
                'birth_place'               => 'Siak',
                'birth_date'                => '2002-12-12',
                'gender'                    => 1,
                'contact'                   => '082274631027',
                'address'                   => 'Jalan Siak',
                'age'                       => '20',
                'blood_type_id'             => 2,
                'maintenance_section_id'    => 2,
                'room_id'                   => 2,
                'diagnosis'                 => 'Sakit Jantung',
                'photo'                     => null,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ],
            [
                'no_mr'                     => 'MR00003',
                'name'                      => 'Augie Darminra',
                'birth_place'               => 'Duri',
                'birth_date'                => '2001-12-12',
                'gender'                    => 1,
                'contact'                   => '082295310393',
                'address'                   => 'Jalan Duri',
                'age'                       => '21',
                'blood_type_id'             => 3,
                'maintenance_section_id'    => 3,
                'room_id'                   => 3,
                'diagnosis'                 => 'Tuberkulosis',
                'photo'                     => null,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ],
            [
                'no_mr'                     => 'MR00004',
                'name'                      => 'Villi Syahfila',
                'birth_place'               => 'Kisaran',
                'birth_date'                => '2001-12-12',
                'gender'                    => 1,
                'contact'                   => '082287332194',
                'address'                   => 'Jalan Kisaran',
                'age'                       => '21',
                'blood_type_id'             => 4,
                'maintenance_section_id'    => 4,
                'room_id'                   => 4,
                'diagnosis'                 => 'Anemia',
                'photo'                     => null,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ],
            [
                'no_mr'                     => 'MR00005',
                'name'                      => 'Oxyta Sri Giyanto',
                'birth_place'               => 'Dumai',
                'birth_date'                => '2001-12-12',
                'gender'                    => 2,
                'contact'                   => '082298765432',
                'address'                   => 'Jalan Dumai',
                'age'                       => '21',
                'blood_type_id'             => 5,
                'maintenance_section_id'    => 5,
                'room_id'                   => 5,
                'diagnosis'                 => 'Belum diketahui',
                'photo'                     => null,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ],
        ];

        Patient::insert($patient);
    }
}
