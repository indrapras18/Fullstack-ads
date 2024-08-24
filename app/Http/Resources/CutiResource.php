<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CutiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'nomor_induk' => $this->nomor_induk,
            'nama' => $this->nama,
            'sisa_cuti' => $this->sisaCuti(),
        ];
    }
}
