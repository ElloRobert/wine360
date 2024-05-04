<?php

namespace App;

use App\Wine;
use App\Wine as AppWine;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configuration';

    protected $fillable = [
        'applicationName',
        'applicationImage',
        'applicationAddress',
        'applicationAddress2',
        'applicationCity',
        'applicationState',
        'applicationZip',
        'applicationCountry',
        'applicationPhone',
        'applicationIndustry',
        'emailForReports',
        'user_id',
        'winery_description',
        'innovations',
        'packaging',
        'wine_assortment',
        'awards',

    ];

     protected $casts = [
        'applicationName' => 'string',
        'applicationImage' => 'string',
        'applicationAddress' => 'string',
        'applicationAddress2' => 'string',
        'applicationCity' => 'string',
        'applicationState' => 'string',
        'applicationZip' => 'string',
        'applicationCountry' => 'string',
        'applicationPhone' => 'string',
        'applicationIndustry' => 'string',
        'applicationPricePerLiter' => 'string',
        'emailForReports' => 'string',
        'user_id' => 'int',
        'winery_description' => 'string',
        'innovations' => 'string', 
        'packaging' => 'string', 
        'wine_assortment' => 'string', 
        'awards' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'configuration_id');
    }
    



    public function industry()
    {
        return $this->belongsTo(Industry::class, 'applicationIndustry');
    }

    public function wines()
    {
        return $this->hasMany(Wine::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'configuration_id');
    }

}
