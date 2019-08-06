<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class Level extends Model
{
    protected $fillable = ['name'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
