<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {return parent::toArray($request);
        // return [
        //     "sliderTitle" => $this->title,
        //     "sliderMessage" => $this->message,
        //     "sliderImage" =>$this->image_url
        // ];
    }
}
