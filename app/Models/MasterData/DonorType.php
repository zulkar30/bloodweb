<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorType extends Model
{
    // Nama tabel
    public $table = 'donor_type';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function donor()
    {
        return $this->hasMany('App\Models\Operational\Donor', 'donor_type_id');
    }

    // Relasi one to many
    public function blood_donor()
    {
        return $this->hasMany('App\Models\Operational\BloodDonor', 'donor_type_id');
    }
}
