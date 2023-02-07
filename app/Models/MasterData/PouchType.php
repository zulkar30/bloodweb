<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PouchType extends Model
{
    // Nama tabel
    public $table = 'pouch_type';

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
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'pouch_type_id');
    }

    // Relasi one to many
    public function blood_donor()
    {
        return $this->hasMany('App\Models\Operational\BloodDonor', 'pouch_type_id');
    }
}
