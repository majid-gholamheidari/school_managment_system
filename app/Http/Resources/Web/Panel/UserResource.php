<?php

namespace App\Http\Resources\Web\Panel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name ?? '-',
            'mobile' => $this->mobile ?? '-',
            'role' => $this->positions->pluck('role_fa')->toArray(),
            'gender' => $this->gender_fa,
            'status' => $this->status_fa,
            'username' => $this->username
        ];
    }
}
