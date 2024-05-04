<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicalOriginLabel extends Model
{
    use HasFactory;

    protected $table = 'geographical_origin_labels';

    protected $fillable = ['region', 'subregion', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function vineyards()
    {
        return $this->hasMany(Vineyard::class);
    }

    public function wines()
    {
        return $this->hasMany(Wine::class);
    }
}
