<?php

namespace App\Repositories;

use App\Ad;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AdRepository.
 */
class AdRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Ad::class;
    }

    /**
     * Valid orderable columns.
     *
     * @return array
     */
    protected $orderable = [
        'price',
        'created_at',
    ];

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'photo' => $this->getOnePhoto(),
        ];
    }

}
