<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Nama tabel
    public $table = 'patient';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'no_mr',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'nik',
        'address',
        'contact',
        'age',
        'blood_type_id',
        'room_id',
        'maintenance_section_id',
        'diagnosis',
        'photo',
        'created_at',
        'updated_at',
        
    ];
    
    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }
    
    // Relasi one to many
    public function room()
    {
        return $this->belongsTo('App\Models\MasterData\Room', 'room_id', 'id');
    }

    // Relasi one to many
    public function maintenance_section()
    {
        return $this->belongsTo('App\Models\MasterData\MaintenanceSection', 'maintenance_section_id', 'id');
    }

    // Relasi one to many
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'patient_id');
    }

    // Relasi one to many
    public function blood_request()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'patient_id');
    }

}
