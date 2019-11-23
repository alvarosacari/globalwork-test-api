<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateLaboralReference extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'candidate_id',
        'company_name',
        'contact_name',
        'start_at',
        'leave_at',
    ];

    public function Candidate()
    {
        return $this->belongsTo('App\Candidate');
    }

}
