<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvisoResource extends JsonResource
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
            'DESCRIPCION' => $this->DESCRIPCION,
            'IMAGEN' => $this->IMAGEN,
            'ANIMAL_ID' => $this->ANIMAL_ID,
            'CONTACTOEXTRA_ID' => $this->CONTACTOEXTRA_ID,
            'ESTADO_ID' => $this->ESTADO_ID
        ];
    }
}
