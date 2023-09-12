<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    /**
     *
     *
     * @return BelongsTo
     */
    public function employe() {
        return $this->belongsTo(Employe::class);
    }
}
