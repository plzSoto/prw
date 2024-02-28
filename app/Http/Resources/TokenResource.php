<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
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
            'TOKEN' => $this->TOKEN,
            'FECHAVENCIMIENTO' => $this->FECHAVENCIMIENTO,
            'FECHACREACION' => $this->FECHACREACION,
            'ULTIMACONEXION' => $this->ULTIMACONEXION,
            'USUARIO_ID' => $this->USUARIO_ID
        ];
    }
}
