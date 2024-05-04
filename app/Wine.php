<?php

namespace App;

use App\Configuration;
use App\Country;
use App\GeographicalOriginLabel;
use App\Vineyard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wine extends Model
{
    protected $table = 'wines';
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'harvest_date', 
        'harvest_method', 
        'vintage_variety',
        'nutrition_data',
        'allergen_declaration',
        'country_of_origin',
        'importer_bottler_manufacturer',
        'harvest_year',
        'alcohol_by_volume',
        'net_quantity_ml',
        'sugar_content',
        'grape_variety_harvest_specific',
        'product_description',
        'expiration_date',
        'file_name_front',
        'file_name_back',
        'configuration_id',
    ];

    protected $dates = ['deleted_at'];

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_of_origin');
    }

    public function geographicalOriginLabels()
    {
        return $this->hasManyThrough(GeographicalOriginLabel::class, Country::class, 'id', 'country_id', 'country_of_origin');
    }

    public function vineyards()
    {
        return $this->hasManyThrough(Vineyard::class, GeographicalOriginLabel::class, 'country_id', 'geographical_origin_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
