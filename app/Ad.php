<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

/**
 * @SWG\Definition(
 *  definition="Ad",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="title",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="description",
 *      type="text"
 *  ),
 * @SWG\Property(
 *      property="price",
 *      type="integer"
 *  )
 * @SWG\Property(
 *      property="photos",
 *      type="array"
 *  )
 * )
 */
/**
 * Class Ad
 *
 * @property int                            $id
 * @property string                         $title
 * @property string                         $description
 * @property int                            $price
 * @property array                          $photos
= */

class Ad extends Model
{
    protected $fillable = [
      'title', 'description', 'price', 'created_at', 'photos'
    ];

    protected $hidden = ['updated_at'];

    protected $casts = [
        'photos' => 'array'
    ];

    public function getOnePhoto()
    {
        $photo = collect($this->photos)->shift();
        return $photo->url;
    }
}
