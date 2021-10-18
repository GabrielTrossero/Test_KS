<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DentistResource;
use App\Http\Resources\PatientResource;
class TreatmentResource extends JsonResource
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
            'external_id' => $this->external_id,
            'plates' => $this->plates,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at, //no le puedo poner formato porque a veces es null
            'ended_at' => $this->ended_at, //no le puedo poner formato porque a veces es null
            'dentist' => DentistResource::make($this->dentist),
            'patient' => PatientResource::make($this->patient),
        ];
    }
}
