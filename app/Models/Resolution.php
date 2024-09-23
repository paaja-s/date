<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    public function pictures(): BelongsToMany
    {
        return $this->belongsToMany(Picture::class);
    }
}
