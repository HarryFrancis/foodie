<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use DB;

class Place extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $fillable = [
        "name",
        "health",
        "slug",
        "lat",
        "lng",
    ];

    public static function getWithDistance($lng, $lat) {
        $lng = DB::getPdo()->quote($lng);
        $lat = DB::getPdo()->quote($lat);

        return static::select("*", DB::raw("3959 * acos(cos(radians({$lat})) * cos(radians(lat)) * cos(radians(lng) - radians({$lng})) + sin(radians({$lat})) * sin(radians(lat))) AS distance"))
            ->orderBy('distance');
    }

    public function formattedDistance()
    {
        return $this->distance < 0.001 ? "Here" : number_format($this->distance, 2) . " miles";
    }
}
