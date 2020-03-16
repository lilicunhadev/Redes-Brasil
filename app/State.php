<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $letter
 * @property int $iso
 * @property string $slug
 * @property int $population
 * @property City[] $cities
 */
class State extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'letter', 'iso', 'slug', 'population'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
