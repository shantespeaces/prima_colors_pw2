<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    use HasFactory;

    /**
     *
     *
     * @return BelongsToMany
     */
    public function reservations() {

        return $this->belongsToMany(Reservation::class);
    }
}
