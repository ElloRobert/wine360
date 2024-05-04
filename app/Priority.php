<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $table = 'priorities';

    protected $fillable = ['name'];

    public function vehicleMalfunctions()
    {
        return $this->hasMany(VehicleMalfunction::class, 'malfunction_priority');
    }

    public function vehicleMaintenances()
    {
        return $this->hasMany(VehiclesMaintenance::class, 'malfunction_priority');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'reminder_priority');
    }
}
