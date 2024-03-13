<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
        'title' => $this->title,
        'image' => $this->image,
        'slug' => $this->slug,
        'date' => $this->date,
        'description' => $this->description,
       ];
    }
}
