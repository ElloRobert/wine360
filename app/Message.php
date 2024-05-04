<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    protected $table = 'messages';
    
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_name',
        'email',
        'message',
        'configuration_id'
    ];

    public function configuration()
    {
        return $this->belongsTo(Configuration::class, 'configuration_id');
    }

  
}
