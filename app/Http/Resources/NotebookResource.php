<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
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
            'id' => $this->resource->id,
            'full_name' => $this->resource->full_name,
            'company' => $this->resource->company,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'date_of_birth' => $this->resource->date_of_birth,
        ];
    }
}
