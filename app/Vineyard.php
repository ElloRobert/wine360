<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vineyard extends Model
{
    use HasFactory;

    protected $table = 'vineyards';

    protected $fillable = ['name', 'geographical_origin_id'];

    public function geographicalOriginLabel()
    {
        return $this->belongsTo(GeographicalOriginLabel::class, 'geographical_origin_id');
    }

    public function wines()
    {
        return $this->hasMany(Wine::class);
    }
}
