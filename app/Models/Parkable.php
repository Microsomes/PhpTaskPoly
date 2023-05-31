<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Parkable extends Model
{
    use HasFactory;

    protected $table = 'parkable';

    public function parkable():MorphTo{
        return $this->morphTo();
    }
    
}
