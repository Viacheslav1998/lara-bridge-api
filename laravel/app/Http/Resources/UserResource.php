<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'phone'      => $this->phone,
            'number'     => $this->number,
            'super'      => $this->super,
            'bio'        => $this->bio,
            'email'      => $this->email,
            'country'    => $this->country,
        ];
    }
}
