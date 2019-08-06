<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Level;

class Player extends Model
{
    protected $fillable = ['level_id', 'name', 'score', 'suspected'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
