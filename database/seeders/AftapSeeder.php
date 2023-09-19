<?php

namespace Database\Seeders;

use App\Models\Operational\Aftap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AftapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aftap = [
            [
                'no_labu'         => 'LABU00001',
                'volume'          => '1',
                'patient_id'      => 1,
                'officer_id'      => 1,
                'donor_id'        => 1,
                'pouch_type_id'   => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'no_labu'         => 'LABU00002',
                'volume'          => '2',
                'patient_id'      => 2,
                'officer_id'      => 1,
                'donor_id'        => 2,
                'pouch_type_id'   => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'no_labu'         => 'LABU00003',
                'volume'          => '1',
                'patient_id'      => 3,
                'officer_id'      => 1,
                'donor_id'        => 3,
                'pouch_type_id'   => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'no_labu'         => 'LABU00004',
                'volume'          => '3',
                'patient_id'      => 4,
                'officer_id'      => 1,
                'donor_id'        => 4,
                'pouch_type_id'   => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'no_labu'         => 'LABU00005',
                'volume'          => '2',
                'patient_id'      => 5,
                'officer_id'      => 1,
                'donor_id'        => 5,
                'pouch_type_id'   => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
        ];

        Aftap::insert($aftap);
    }
}
