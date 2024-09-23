<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    
    public function resolutions(): BelongsToMany
    {
        return $this->belongsToMany(Resolution::class);
    }
    
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }
}
