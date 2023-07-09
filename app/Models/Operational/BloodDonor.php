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
        'officer_id',
        'blood_type_id',
        'pouch_type_id',
        'donor_type_id',
        'donor_id',
        'donor_reaction',
        'retrieval_process',
        'donor_status',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }

    // Relasi one to many
    public function pouch_type()
    {
        return $this->belongsTo('App\Models\MasterData\PouchType', 'pouch_type_id', 'id');
    }

    // Relasi one to many
    public function donor_type()
    {
        return $this->belongsTo('App\Models\MasterData\DonorType', 'donor_type_id', 'id');
    }

    // Relasi one to many
    public function donor()
    {
        return $this->belongsTo('App\Models\Operational\Donor', 'donor_id', 'id');
    }
}
