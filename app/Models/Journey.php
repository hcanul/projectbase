<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'type'];

    public function town()
    {
        return $this->hasMany(Town::class);
    }
}
