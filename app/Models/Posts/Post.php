<?php

namespace App\Models\Posts;

use DB;
use App\Traits\PhotoableTrait;
use App\Traits\CommentableTrait;
use App\Traits\TrackableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use PhotoableTrait,
        CommentableTrait,
        TrackableTrait;

    protected $table = 'posts';

    protected $fillable = ['post_title', 'post_content', 'pet_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet()
    {

        return $this->belongsTo('App\Models\Animals\Pet');

    }

    /**
     * Scope posts within a given range
     * @param $lat
     * @param $lng
     * @param int $max_distance
     * @param int $max_locations
     * @param string $units
     * @return mixed
     */
    public function scopeInRange($lat, $lng, $max_distance = 25, $max_locations = 10, $units = 'miles')
    {

            /*
             *  Allow for changing of units of measurement
             */
            switch ( $units ) {
                default:
                case 'miles':
                    //radius of the great circle in miles
                    $gr_circle_radius = 3959;
                    break;
                case 'kilometers':
                    //radius of the great circle in kilometers
                    $gr_circle_radius = 6371;
                    break;
            }
            /*
             *
             *  Generate the select field for disctance
             */
            $disctance_select = sprintf(
                "*, ( %d * acos( cos( radians(%s) ) " .
                " * cos( radians( latitude ) ) " .
                " * cos( radians( longitude ) - radians(%s) ) " .
                " + sin( radians(%s) ) * sin( radians( latitude ) ) " .
                ") " .
                ") " .
                "AS distance",
                $gr_circle_radius,
                $lat,
                $lng,
                $lat
            );

            return $this->with(['coordinates', function($q) use($disctance_select, $max_distance, $max_locations){
                $q->select( DB::raw($disctance_select) )
                    ->having( 'distance', '<', $max_distance )
                    ->take( $max_locations )
                    ->orderBy( 'distance', 'ASC' )
                    ->get();
            }])->get();


    }


}
