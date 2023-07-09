<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    // Nama tabel
    public $table = 'blood_request';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'doctor_id',
        'officer_id',
        'patient_id',
        'blood_type_id',
        'name',
        'address',
        'contact',
        'gender',
        'age',
        'wb',
        'we',
        'prc',
        'tc',
        'ffp',
        'cry',
        'plasma',
        'prp',
        'total',
        'fulfilled',
        'status',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function doctor()
    {
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id', 'id');
    }

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }

    // Relasi one to many
    public function patient()
    {
        return $this->belongsTo('App\Models\Operational\Patient', 'patient_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }
}
