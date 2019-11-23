<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateLaboralReferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'candidate_id' => $this->candidate_id,
            'company_name' => $this->company_name,
            'contact_name' => $this->contact_name,
            'start_at' => $this->start_at,
            'leave_at' => $this->leave_at,
        ];

        return $data;
    }
}
