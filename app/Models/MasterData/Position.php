<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    // Nama tabel
    public $table = 'position';

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
    public function officer()
    {
        return $this->hasMany('App\Models\MasterData\Officer', 'position_id');
    }

    // Relasi one to many
    public function doctor()
    {
        return $this->hasMany('App\Models\Operational\Doctor', 'position_id');
    }
}
