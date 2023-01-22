<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    // Nama tabel
    public $table = 'donor';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'profession_id',
        'blood_type_id',
        'name',
        'birth_place',
        'birth_date',
        'gender',
        'contact',
        'address',
        'age',
        'photo',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'donor_id');
    }

    // Relasi one to many
    public function profession()
    {
        return $this->belongsTo('App\Models\MasterData\Profession', 'profession_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\Blood_type', 'blood_type_id', 'id');
    }
}
