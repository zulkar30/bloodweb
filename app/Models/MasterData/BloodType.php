<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    // Nama tabel
    public $table = 'blood_type';

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
    public function officer()
    {
        return $this->hasMany('App\Models\MasterData\Officer', 'blood_type_id');
    }

    // Relasi one to many
    public function doctor()
    {
        return $this->hasMany('App\Models\Operational\Doctor', 'blood_type_id');
    }

    // Relasi one to many
    public function donor()
    {
        return $this->hasMany('App\Models\Operational\Donor', 'blood_type_id');
    }

    // Relasi one to many
    public function patient()
    {
        return $this->hasMany('App\Models\Operational\Patient', 'blood_type_id');
    }

    // Relasi one to many
    public function blood_donor()
    {
        return $this->hasMany('App\Models\Operational\BloodDonor', 'blood_type_id');
    }

    // Relasi one to many
    public function blood_request()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'blood_type_id');
    }

    // Relasi one to many
    public function blood_supply()
    {
        return $this->hasMany('App\Models\Operational\BloodSupply', 'blood_type_id');
    }
}
