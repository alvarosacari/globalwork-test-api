<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CandidateResource extends JsonResource
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
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
        ];

        if (isset($request->include) && Str::contains($request->include, 'laboral_references')) {
            $data['laboral_references'] = CandidateLaboralReferenceResource::collection($this->laboralReferences);
        }

        return $data;
    }
}
