<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Dish;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    
    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }
}
