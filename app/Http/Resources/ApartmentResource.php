<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'rooms' => $this->rooms,
            'beds' => $this->beds,
            'bathrooms' => $this->bathrooms,
            'metri_quadrati' => $this->metri_quadrati,
            'price' => number_format($this->price / 100 , 2),
            'cover_img' => $this->cover_img,
        ];
    }
}
