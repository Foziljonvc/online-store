<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'comments' => $this->comments,
            'category_id' => [
                'id' => $this->category_id,
                'name' => $this->category->name,
                'description' => $this->category->description,
                'image' => $this->category->image,
                'parent' => $this->category->parent
            ],
        ];
    }
}
