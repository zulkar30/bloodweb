<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aftap extends Model
{
    // Nama tabel
    public $table = 'aftap';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'no_labu',
        'patient_id',
        'donor_id',
        'pouch_type_id',
        'volume',
        'officer_id',
        'created_at',
        'updated_at',
    ];
    
    // Relasi one to many
    public function patient()
    {
        return $this->belongsTo('App\Models\Operational\Patient', 'patient_id', 'id');
    }
    
    // Relasi one to many
    public function donor()
    {
        return $this->belongsTo('App\Models\Operational\Donor', 'donor_id', 'id');
    }
    
    // Relasi one to many
    public function pouch_type()
    {
        return $this->belongsTo('App\Models\MasterData\PouchType', 'pouch_type_id', 'id');
    }

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }
    
    // Relasi one to many
    public function screening()
    {
        return $this->hasMany('App\Models\Operational\Screening', 'aftap_id');
    }
}
