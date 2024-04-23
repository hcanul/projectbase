<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Action;

class Voter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'coordinator_id', 'agent_id', 'activist_id', 'town_id', 'name', 'lastname', 'email', 'facebook', 'street', 'extNum', 'cologne_id', 'edad', 'claveElector', 'curp' ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function activist()
    {
        return $this->belongsTo(Activist::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }
}
