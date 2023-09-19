<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    // Nama tabel
    public $table = 'donor';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'no_reg',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'nik',
        'address',
        'contact',
        'profession_id',
        'age',
        'blood_type_id',
        'donor_type_id',
        'photo',
        'status',
        'created_at',
        'updated_at',
    ];

    
    // Relasi one to many
    public function profession()
    {
        return $this->belongsTo('App\Models\MasterData\Profession', 'profession_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }
    
    // Relasi one to many
    public function donor_type()
    {
        return $this->belongsTo('App\Models\MasterData\DonorType', 'donor_type_id', 'id');
    }

    // Relasi one to many
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'donor_id');
    }

    // Relasi one to many
    public function blood_donor()
    {
        return $this->hasMany('App\Models\Operational\BloodDonor', 'donor_id');
    }

}
