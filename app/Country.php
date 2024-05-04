<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = ['name'];

    public function geographicalOriginLabels()
    {
        return $this->hasMany(GeographicalOriginLabel::class);
    }

    public function vineyards()
    {
        return $this->hasManyThrough(Vineyard::class, GeographicalOriginLabel::class);
    }

    public function wines()
    {
        return $this->hasMany(Wine::class, 'country_of_origin');
    }
}
