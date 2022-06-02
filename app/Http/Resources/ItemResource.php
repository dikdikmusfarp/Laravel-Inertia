<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'short_description' => Str::limit($this->description, 10),
            'image' => $this->image,
            'price' => $this->price,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // 'created' => $this->created_at->diffForHumans(),
            // 'is_approved' => (bool) $this->approved_at,
            'is_approved' => $this->approved_at ? 'Disetujui' : 'Pending',
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
