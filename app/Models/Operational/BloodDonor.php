<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    // Nama tabel
    public $table = 'blood_donor';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'name',
        'hb',
        't_meter',
        'bb',
        'result',
        'created_at',
        'updated_at',
        'officer_id',
        'blood_request_id',
        'blood_type_id',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }

    // Relasi one to many
    public function blood_request()
    {
        return $this->belongsTo('App\Models\Operational\BloodRequest', 'blood_request_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }
}
