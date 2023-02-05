<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSection extends Model
{
    // Nama tabel
    public $table = 'maintenance_section';

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
    public function patient()
    {
        return $this->hasMany('App\Models\Operational\Patient', 'maintenance_section_id');
    }
}
