<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PollutionsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($pollution) {
            return [
                'id' => $pollution->id,
                'user_name' => $pollution->user->full_name,
                'latitude' => $pollution->latitude,
                'longitude' => $pollution->longitude,
                'unfixed_image' => $pollution->unfixed_image,
                'x' => $pollution->x,
                'y' => $pollution->y,
                'w' => $pollution->w,
                'z' => $pollution->z,
                'pollution_id' => $pollution->pollution_id,
                'type' => $pollution->pollution->type,
                'is_fixed' => $pollution->is_fixed,
                'fixed_image' => $pollution->fixed_image,
                'created_at' => $pollution->created_at,
                'updated_at' => $pollution->updated_at
            ];
        });
    }
}
