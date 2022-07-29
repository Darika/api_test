<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsBaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'currentPage' => $this->currentPage(),
            'lastPage' =>  $this->lastPage(),
            'total' => $this->total(),
            'itemsPerPage' => $this->perPage(),
            'items' => AdResource::collection($this->getCollection()),
        ];
    }
}
