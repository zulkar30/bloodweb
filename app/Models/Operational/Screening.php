<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    // Nama tabel
    public $table = 'screening';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'no_sc',
        'hiv',
        'hcv',
        'hbsag',
        'vdrl',
        'result',
        'created_at',
        'updated_at',
        'officer_id',
        'aftap_id',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }
    
    // Relasi one to many
    public function aftap()
    {
        return $this->belongsTo('App\Models\Operational\Aftap', 'aftap_id', 'id');
    }

    // Relasi one to many
    public function crossmatch()
    {
        return $this->hasMany('App\Models\Operational\Crossmatch', 'screening_id');
    }

}
