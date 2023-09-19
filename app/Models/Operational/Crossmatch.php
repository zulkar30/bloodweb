<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crossmatch extends Model
{
    // Nama tabel
    public $table = 'crossmatch';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'no_cm',
        'fase1',
        'fase2',
        'fase3',
        'result',
        'created_at',
        'updated_at',
        'officer_id',
        'screening_id',
    ];

    // Relasi one to many
    public function officer()
    {
        return $this->belongsTo('App\Models\Operational\Officer', 'officer_id', 'id');
    }
    
    // Relasi one to many
    public function screening()
    {
        return $this->belongsTo('App\Models\Operational\Screening', 'screening_id', 'id');
    }

}
