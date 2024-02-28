<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
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
            'COLOR_ID' => $this->COLOR_ID,
            'TAMAÑO_ID' => $this->TAMAÑO_ID,
            'ESPECIE_ID' => $this->ESPECIE_ID
        ];
    }
}
