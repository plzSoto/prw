<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactoExtraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->ID,
            'NOMBRE' => $this->NOMBRE,
            'TELEFONO' => $this->TELEFONO,
            'EMAIL' => $this->EMAIL
        ];
    }
}
