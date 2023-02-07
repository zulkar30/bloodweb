<?php

namespace Database\Seeders;

use App\Models\Operational\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officer = [
            [
                'user_id'        => 1,
                'name'           => 'Staff Zul',
                'birth_place'    => 'Rintis',
                'birth_date'     => '2000-03-30',
                'gender'         => 1,
                'contact'        => '082287354040',
                'address'        => 'Jalan Pramuka Gang Haji Ilyas',
                'age'            => '22',
                'blood_type_id'  => 7,
                'position_id'    => 12,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'user_id'        => 4,
                'name'           => 'Staff Tian',
                'birth_place'    => 'Rupat',
                'birth_date'     => '2002-12-12',
                'gender'         => 1,
                'contact'        => '082235271820',
                'address'        => 'Jalan Kebun Kapas',
                'age'            => '20',
                'blood_type_id'  => 1,
                'position_id'    => 1,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'user_id'        => 5,
                'name'           => 'Staff Obi',
                'birth_place'    => 'Teluk Latak',
                'birth_date'     => '2002-12-12',
                'gender'         => 1,
                'contact'        => '085102917482',
                'address'        => 'Jalan Panglima Minal',
                'age'            => '20',
                'blood_type_id'  => 6,
                'position_id'    => 2,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'user_id'        => 6,
                'name'           => 'Staff Azmi',
                'birth_place'    => 'Pakning',
                'birth_date'     => '2002-12-12',
                'gender'         => 1,
                'contact'        => '082287391734',
                'address'        => 'Jalan Dompas',
                'age'            => '20',
                'blood_type_id'  => 3,
                'position_id'    => 3,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'user_id'        => 7,
                'name'           => 'Staff Andre',
                'birth_place'    => 'Bengkalis',
                'birth_date'     => '2002-12-12',
                'gender'         => 1,
                'contact'        => '082298752619',
                'address'        => 'Jalan Panglima Minal',
                'age'            => '20',
                'blood_type_id'  => 4,
                'position_id'    => 4,
                'photo'          => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ]
        ];

        Officer::insert($officer);
    }
}
