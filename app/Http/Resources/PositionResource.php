<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{
    public function __construct($resource)
    {
        $this->resource = $resource;
    }    

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'tracked_at' => $this->tracked_at,
            'speed' => $this->speed,
            'voltage' => $this->voltage,
            'distance' => $this->distance
        ];
    }
}
