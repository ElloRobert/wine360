<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminders';

    protected $fillable = [
    	'name',
    	'category',
    	'details',
    	'end_date_reminder',
        'status',
        'completed_date',
        'cron_mail',
        'creator_id',
        'reminder_priority',
        'recurring_reminder_id',
    ];

    protected $casts = [
    	'name' => 'string',
    	'category' => 'string',
    	'details' => 'string',
    	'end_date_reminder' => 'datetime',
        'status' => 'int',
        'completed_date' => 'datetime',
        'cron_mail' => 'bool',
        'creator_id' => 'int',
        'reminder_priority' => 'int',
        'recurring_reminder_id' => 'int',
        
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->status == true;
    }

    public function recurringReminder()
    {
        return $this->belongsTo(RecurringReminder::class, 'recurring_reminder_id');
    }


    public function priority()
    {
        return $this->belongsTo(Priority::class, 'reminder_priority');
    }
}
