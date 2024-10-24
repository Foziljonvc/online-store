<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return parent::toArray($request);

//        return [
//            'id' => $this->id,
//            'name' => $this->name,
//            'description' => $this->description,
//            'price' => $this->price,
//            'image' => $this->image,
//            'comments' => $this->comments,
//            'category_id' => [
//                'id' => $this->category->id,
//                'name' => $this->category->name,
//                'description' => $this->category->description,
//                'image' => $this->category->image,
//                'parent' => $this->category->parent
//            ],
//        ];
    }
}
