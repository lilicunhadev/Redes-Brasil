<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $state_id
 * @property string $title
 * @property int $iso
 * @property int $iso_ddd
 * @property int $status
 * @property string $slug
 * @property int $population
 * @property float $lat
 * @property float $long
 * @property float $income_per_capita
 * @property State $state
 */
class City extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['state_id', 'title', 'iso', 'iso_ddd', 'status', 'slug', 'population', 'lat', 'long', 'income_per_capita'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
