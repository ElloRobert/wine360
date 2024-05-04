<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringReminder extends Model
{
    use HasFactory;

    protected $table = 'recurring_reminders';

    protected $fillable = ['name'];
}
