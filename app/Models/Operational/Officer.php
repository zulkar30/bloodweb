<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    // Nama tabel
    public $table = 'officer';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'user_id',
        'position_id',
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

    // Relasi one to one
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // Relasi one to many
    public function position()
    {
        return $this->belongsTo('App\Models\MasterData\Position', 'position_id', 'id');
    }

    // Relasi one to many
    public function blood_type()
    {
        return $this->belongsTo('App\Models\MasterData\BloodType', 'blood_type_id', 'id');
    }

    // Relasi one to many
    public function aftap()
    {
        return $this->hasMany('App\Models\Operational\Aftap', 'officer_id');
    }

    // Relasi one to many
    public function blood_donor()
    {
        return $this->hasMany('App\Models\Operational\BloodDonor', 'officer_id');
    }

    // Relasi one to many
    public function blood_request()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'officer_id');
    }

    // Relasi one to many
    public function crossmatch()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'officer_id');
    }

    // Relasi one to many
    public function screening()
    {
        return $this->hasMany('App\Models\Operational\BloodRequest', 'officer_id');
    }
}
