<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = ['name', 'code'];

    public function wines()
    {
        return $this->hasMany(Wine::class);
    }
}
