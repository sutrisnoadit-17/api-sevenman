<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class item extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $request->id,
            'item_name' => $this->item_name,
            'description' => $this->description,
            'condition' => $this->condition,
            'location'=> $this->location,
            'is_already'=> $this->is_already,
            'category_id'=> $this->category_id,
            'user_id'=> $this->user_id
            // 'category_name'=> $this->category_name
        ];
        // return parent::toArray($request);
    }
}
