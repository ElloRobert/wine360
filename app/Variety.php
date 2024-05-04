<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $table = 'varieties';

    protected $fillable = ['name'];

    public function wines()
    {
        return $this->hasMany(Wine::class);
    }
}
