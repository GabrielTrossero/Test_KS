<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DentistResource extends JsonResource
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
            'email' => $this->user->email,
            'full_name' => $this->full_name,
        ];
    }
}
