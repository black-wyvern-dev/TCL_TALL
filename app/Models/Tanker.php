<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanker extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'fleet_num',
        'make',
        'equipment',
        'replacement_value',
        'chassis_num',
        'serial_num',
        'tank_type',
        'sector',
        'type',
        'usage',
        'archive',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'mot_expiry' => 'date',
        'adr_expiry' => 'date',
        'discharge_pump' => 'boolean',
    ];

    public function qr()
    {
        return $this->hasOne(Qr::class, 'tankers_id');
    }

    public function hires()
    {
        return $this->hasMany(Hire::class);
    }
}
