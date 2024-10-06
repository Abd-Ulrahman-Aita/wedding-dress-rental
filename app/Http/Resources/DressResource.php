<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'sizes' => $this->sizes,
            'quantity' => $this->quantity,
            'rental_price' => $this->rental_price,
            'image_url' => $this->image_url,
        ];
    }
}
