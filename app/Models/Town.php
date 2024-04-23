<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'journey_id'];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function coordinator()
    {
        return $this->hasMany(Coordinator::class);
    }

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }

    public function activist()
    {
        return $this->hasMany(Activist::class);
    }

    public function voter()
    {
        return $this->hasMany(Voter::class);
    }
}
