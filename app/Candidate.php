<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'address',
    ];

    public function laboralReferences()
    {
        return $this->hasMany('App\CandidateLaboralReference');
    }
}
