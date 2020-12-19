<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FuncionarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'empresa_id' => $this->empresa_id,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'CPF' => $this->CPF,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
