<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'name', 'lastname', 'tel', 'email', 'facebook', 'address', 'town_id', 'yearold', 'section', 'clave', 'curp', 'type', 'ruta', 'agent_id'];

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function voter()
    {
        return $this->hasMany(Voter::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
