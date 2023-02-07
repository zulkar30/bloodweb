<?php

namespace Database\Seeders;

use App\Models\Operational\Donor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donor = [
            [
                'name'           => 'Darman Yaman',
                'birth_place'    => 'Pangkalan Kerinci',
                'birth_date'     => '2001-12-12',
                'gender'         => 1,
                'contact'        => '082284730283',
                'address'        => 'Jalan Kuala Alam',
                'age'            => '21',
                'blood_type_id'  => 1,
                'donor_type_id'  => 1,
                'profession_id'  => 1,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'name'           => 'Imron Rosadi',
                'birth_place'    => 'Siak',
                'birth_date'     => '2002-12-12',
                'gender'         => 1,
                'contact'        => '082212743018',
                'address'        => 'Jalan Siak',
                'age'            => '20',
                'blood_type_id'  => 2,
                'donor_type_id'  => 2,
                'profession_id'  => 2,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'name'           => 'Fira Ustiana',
                'birth_place'    => 'Pakning',
                'birth_date'     => '2001-12-12',
                'gender'         => 1,
                'contact'        => '082275491028',
                'address'        => 'Jalan Dompas',
                'age'            => '21',
                'blood_type_id'  => 3,
                'donor_type_id'  => 3,
                'profession_id'  => 3,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'name'           => 'Tiya Witiyana',
                'birth_place'    => 'Bengkalis',
                'birth_date'     => '2001-12-12',
                'gender'         => 1,
                'contact'        => '082297483012',
                'address'        => 'Jalan Dompas',
                'age'            => '21',
                'blood_type_id'  => 4,
                'donor_type_id'  => 1,
                'profession_id'  => 4,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'name'           => 'Mutiara Rania',
                'birth_place'    => 'Dumai',
                'birth_date'     => '2001-12-12',
                'gender'         => 2,
                'contact'        => '082234281028',
                'address'        => 'Jalan Dumai',
                'age'            => '21',
                'blood_type_id'  => 5,
                'donor_type_id'  => 2,
                'profession_id'  => 5,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
        ];

        Donor::insert($donor);
    }
}
